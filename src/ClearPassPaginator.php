<?php

namespace spkm\ClearPass;

use Illuminate\Support\LazyCollection;
use JsonException;
use LogicException;
use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\OffsetPaginator;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Exceptions\ServerErrorException;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Support\Payload;

/**
 * Pages through a list with ClearPass's offset and limit parameters, stopping at a page shorter than the limit or
 * one without a link to the next.
 */
class ClearPassPaginator extends OffsetPaginator
{
    protected ?int $perPageLimit = 100;

    public function __construct(Connector $connector, Request $request, ?int $perPage = null)
    {
        parent::__construct($connector, $request);

        if ($perPage !== null) {
            $this->perPageLimit = $perPage;
        }
    }

    /**
     * Every item on every page, as the request's models.
     *
     * @return LazyCollection<int, Data>
     */
    public function dtos(): LazyCollection
    {
        $request = $this->getOriginalRequest();
        $dto = $request instanceof ClearPassRequest ? $request->dtoClass() : null;

        if ($dto === null) {
            throw new LogicException(class_basename($request).' has no model; use collect() for its items as arrays.');
        }

        return $this->models($dto);
    }

    /**
     * Every item on every page as the given model.
     *
     * @template TModel of Data
     *
     * @param  class-string<TModel>  $model
     * @return LazyCollection<int, TModel>
     */
    public function models(string $model): LazyCollection
    {
        return $this->collect()->map(fn (array $item) => $model::from($item));
    }

    protected function isLastPage(Response $response): bool
    {
        $items = $this->getPageItems($response, $response->getRequest());

        if ($items === [] || ($this->perPageLimit !== null && count($items) < $this->perPageLimit)) {
            return true;
        }

        try {
            $json = Payload::json($response);
        } catch (JsonException) {
            return true;
        }

        return ! is_array($json) || ! isset($json['_links']) || empty($json['_links']['next']);
    }

    /**
     * @return list<array<string, mixed>>
     */
    protected function getPageItems(Response $response, Request $request): array
    {
        try {
            return Payload::records($response);
        } catch (JsonException) {
            throw new ServerErrorException($response);
        }
    }

    /**
     * How many pages there are, which ClearPass says only when the request asked for calculate_count.
     */
    protected function getTotalPages(Response $response): int
    {
        try {
            $count = Payload::count($response);
        } catch (JsonException) {
            throw new ServerErrorException($response);
        }

        return $this->perPageLimit === null ? 1 : (int) ceil($count / $this->perPageLimit);
    }
}
