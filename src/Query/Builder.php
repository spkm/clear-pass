<?php

namespace spkm\ClearPass\Query;

use Closure;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use LogicException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;
use spkm\ClearPass\ClearPassApiException;
use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\ClearPassPaginator;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Exceptions\NotFoundException;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Resources\BaseResource;
use spkm\ClearPass\Support\Payload;

/**
 * An Eloquent-style query over one ClearPass collection. Each resource extends it, saying which requests list,
 * fetch, create, update, replace and delete its records; the builder turns where(), orderBy() and the rest into
 * ClearPass's filter, sort, offset and limit parameters and the response into models.
 *
 * @template TData of Data
 *
 * @extends BaseResource<TData>
 */
abstract class Builder extends BaseResource
{
    protected Query $query;

    /**
     * @param  class-string<TData>|null  $dataClass  The model records are returned as; null for arrays.
     */
    public function __construct(ClearPassConnector $connector, ?string $dataClass)
    {
        parent::__construct($connector, $dataClass);

        $this->query = Query::make($this->dateFormat());
    }

    abstract protected function listRequest(Query $query): ListRequest;

    protected function itemRequest(int|string $id): ?ClearPassRequest
    {
        return null;
    }

    /**
     * @param  array<string, mixed>  $body
     * @param  array<string, mixed>  $options
     */
    protected function createRequest(array $body, array $options): ?ClearPassRequest
    {
        return null;
    }

    /**
     * @param  array<string, mixed>  $body
     * @param  array<string, mixed>  $options
     */
    protected function updateRequest(int|string $id, array $body, array $options): ?ClearPassRequest
    {
        return null;
    }

    /**
     * @param  array<string, mixed>  $body
     * @param  array<string, mixed>  $options
     */
    protected function replaceRequest(int|string $id, array $body, array $options): ?ClearPassRequest
    {
        return null;
    }

    /**
     * @param  array<string, mixed>  $options
     */
    protected function deleteRequest(int|string $id, array $options): ?ClearPassRequest
    {
        return null;
    }

    /**
     * A condition on a field: where('role_id', 2), where('expire_time', '<', now()), where('sponsor_name', null).
     * Conditions on different fields, and different operators on one field, are ANDed.
     */
    public function where(string $field, mixed $operator = null, mixed $value = null): static
    {
        if (func_num_args() === 2 && ! $operator instanceof Operator) {
            if ($operator === null) {
                return $this->whereNull($field);
            }

            [$operator, $value] = [Operator::Equal, $operator];
        }

        $this->query = $this->query->where($field, $operator ?? Operator::Equal, $value);

        return $this;
    }

    /**
     * Everything so far, OR this: a condition (orWhere('role_id', 3)) or a group (orWhere(fn ($query) => ...)).
     */
    public function orWhere(Closure|string $field, mixed $operator = null, mixed $value = null): static
    {
        if ($field instanceof Closure) {
            $this->query = $this->query->withFilter($this->query->filter()->or($this->group($field)));

            return $this;
        }

        $alternative = $this->fresh();
        func_num_args() === 2 ? $alternative->where($field, $operator) : $alternative->where($field, $operator, $value);
        $this->query = $this->query->withFilter($this->query->filter()->or($alternative->toFilter()));

        return $this;
    }

    /**
     * Not this: a condition (whereNot('enabled', true)) or a group (whereNot(fn ($query) => ...)).
     */
    public function whereNot(Closure|string $field, mixed $value = null): static
    {
        if ($field instanceof Closure) {
            $this->query = $this->query->withFilter($this->query->filter()->not($this->group($field)));

            return $this;
        }

        return $this->where($field, Operator::NotEqual, $value);
    }

    /**
     * @param  iterable<mixed>  $values
     */
    public function whereIn(string $field, iterable $values): static
    {
        return $this->where($field, Operator::In, $values);
    }

    /**
     * @param  iterable<mixed>  $values
     */
    public function whereNotIn(string $field, iterable $values): static
    {
        return $this->where($field, Operator::NotIn, $values);
    }

    /**
     * @param  array{mixed, mixed}  $range
     */
    public function whereBetween(string $field, array $range): static
    {
        [$from, $to] = $range;

        return $this->where($field, Operator::GreaterOrEqual, $from)->where($field, Operator::LessOrEqual, $to);
    }

    public function whereContains(string $field, string $value): static
    {
        return $this->where($field, Operator::Contains, $value);
    }

    /**
     * A regular expression match, case-sensitive unless $caseInsensitive.
     */
    public function whereRegex(string $field, string $pattern, bool $caseInsensitive = false): static
    {
        $this->query = $this->query->where($field, Operator::Regex, $pattern, $caseInsensitive ? 'i' : null);

        return $this;
    }

    public function whereNull(string $field): static
    {
        return $this->where($field, Operator::Exists, false);
    }

    public function whereNotNull(string $field): static
    {
        return $this->where($field, Operator::Exists, true);
    }

    public function orderBy(string $field, string $direction = 'asc'): static
    {
        $this->query = $this->query->orderBy($field, $direction);

        return $this;
    }

    public function orderByDesc(string $field): static
    {
        return $this->orderBy($field, 'desc');
    }

    public function offset(int $offset): static
    {
        $this->query = $this->query->offset($offset);

        return $this;
    }

    /**
     * How many records to return (1 to 1000; ClearPass returns 25 when not told).
     */
    public function limit(int $limit): static
    {
        $this->query = $this->query->limit($limit);

        return $this;
    }

    public function forPage(int $page, int $perPage): static
    {
        return $this->offset(($page - 1) * $perPage)->limit($perPage);
    }

    /**
     * One page of matching records: as many as limit() asked for, or ClearPass's 25.
     *
     * @return Collection<int, TData>
     */
    public function get(): Collection
    {
        /** @var Collection<int, TData> */
        return Payload::items($this->send($this->query), $this->dataClass);
    }

    /**
     * Every matching record, fetched a page at a time.
     *
     * @return Collection<int, TData>
     */
    public function all(?int $perPage = null): Collection
    {
        return $this->lazy($perPage)->collect();
    }

    /**
     * The first matching record in sort order.
     *
     * @return TData|null
     */
    public function first(): mixed
    {
        return Payload::object($this->send($this->query->limit(1)), $this->dataClass);
    }

    /**
     * How many records match.
     */
    public function count(): int
    {
        return Payload::count($this->send($this->query->limit(1)->calculateCount()));
    }

    public function exists(): bool
    {
        return $this->count() > 0;
    }

    /**
     * The record with the given id, or null when ClearPass has none.
     *
     * @return TData|null
     */
    public function find(int|string $id): mixed
    {
        $request = $this->itemRequest($id);

        if ($request === null) {
            return $this->fresh()->where('id', $id)->first();
        }

        return $this->fetchOrNull($request);
    }

    /**
     * @return TData
     */
    public function findOrFail(int|string $id): mixed
    {
        $request = $this->itemRequest($id);

        if ($request === null) {
            $record = $this->find($id);

            if ($record === null) {
                throw new NotFoundException($this->send($this->fresh()->where('id', $id)->toQuery()->limit(1)));
            }

            return $record;
        }

        return $this->fetch($request);
    }

    /**
     * Every matching record, fetched a page at a time as the loop reaches it.
     *
     * @return LazyCollection<int, TData>
     */
    public function lazy(?int $perPage = null): LazyCollection
    {
        $paginator = $this->paginate($perPage);
        $dataClass = $this->dataClass;

        return LazyCollection::make(function () use ($paginator, $dataClass) {
            try {
                foreach ($dataClass === null ? $paginator->collect() : $paginator->models($dataClass) as $item) {
                    yield $item;
                }
            } catch (RequestException $exception) {
                throw $exception instanceof ClearPassApiException ? $exception : ClearPassApiException::fromResponse($exception->getResponse());
            }
        });
    }

    /**
     * @return LazyCollection<int, TData>
     */
    public function cursor(?int $perPage = null): LazyCollection
    {
        return $this->lazy($perPage);
    }

    /**
     * A paginator over the matching records, for fetching pages one at a time yourself.
     */
    public function paginate(?int $perPage = null): ClearPassPaginator
    {
        return $this->connector->paginate($this->listRequest($this->query->withoutPaging()), $perPage);
    }

    /**
     * Create a record. ClearPass answers with the record it stored.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options  Query options the operation documents, such as change_of_authorization.
     * @return TData|null
     */
    public function create(array|Data $attributes, array $options = []): mixed
    {
        return $this->fetch($this->createRequest($this->payloadOf($attributes), $options) ?? $this->undocumented('create'));
    }

    /**
     * Change some fields of a record. ClearPass answers with the record as updated, or nothing when nothing changed.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     * @return TData|null
     */
    public function update(int|string $id, array|Data $attributes, array $options = []): mixed
    {
        return $this->fetch($this->updateRequest($id, $this->payloadOf($attributes), $options) ?? $this->undocumented('update'));
    }

    /**
     * Replace a record. ClearPass answers with the record as stored, or nothing when nothing changed.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     * @return TData|null
     */
    public function replace(int|string $id, array|Data $attributes, array $options = []): mixed
    {
        return $this->fetch($this->replaceRequest($id, $this->payloadOf($attributes), $options) ?? $this->undocumented('replace'));
    }

    /**
     * @param  array<string, mixed>  $options
     */
    public function delete(int|string $id, array $options = []): bool
    {
        $this->fetch($this->deleteRequest($id, $options) ?? $this->undocumented('delete'));

        return true;
    }

    /**
     * The request get() would send, for sending through the connector yourself.
     */
    public function toRequest(): ListRequest
    {
        return $this->listRequest($this->query);
    }

    public function toQuery(): Query
    {
        return $this->query;
    }

    public function toFilter(): Filter
    {
        return $this->query->filter();
    }

    /**
     * The query parameters get() would send.
     *
     * @return array<string, string|int>
     */
    public function toArray(): array
    {
        return $this->query->toArray();
    }

    protected function send(Query $query): Response
    {
        $response = $this->connector->send($this->listRequest($query));

        if (! $response->successful()) {
            throw ClearPassApiException::fromResponse($response);
        }

        return $response;
    }

    /**
     * A copy of this builder with no conditions, for building a group or an alternative.
     */
    protected function fresh(): static
    {
        $fresh = clone $this;
        $fresh->query = Query::make($this->dateFormat());

        return $fresh;
    }

    private function group(Closure $callback): Filter
    {
        $group = $this->fresh();
        $callback($group);

        return $group->toFilter();
    }

    private function undocumented(string $action): never
    {
        throw new LogicException("ClearPass's API documents no way to $action these records.");
    }
}
