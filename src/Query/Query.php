<?php

namespace spkm\ClearPass\Query;

use InvalidArgumentException;
use Stringable;

/**
 * The query string of a list request, built up immutably: filter (a JSON expression), sort (+field or -field),
 * offset, limit (1 to 1000) and calculate_count.
 */
final class Query implements Stringable
{
    private Filter $filter;

    private ?string $sort = null;

    private ?int $offset = null;

    private ?int $limit = null;

    private bool $calculateCount = false;

    public function __construct(?Filter $filter = null, string $dateFormat = DATE_ATOM)
    {
        $this->filter = $filter ?? Filter::make($dateFormat);
    }

    public static function make(string $dateFormat = DATE_ATOM): self
    {
        return new self(null, $dateFormat);
    }

    public function filter(): Filter
    {
        return $this->filter;
    }

    public function withFilter(Filter $filter): self
    {
        $query = clone $this;
        $query->filter = $filter;

        return $query;
    }

    /**
     * A condition on a field, ANDed with the ones before it.
     */
    public function where(string $field, Operator|string $operator, mixed $value = null, ?string $options = null): self
    {
        return $this->withFilter($this->filter->where($field, $operator, $value, $options));
    }

    public function orderBy(string $field, string $direction = 'asc'): self
    {
        $direction = strtolower($direction);

        if (! in_array($direction, ['asc', 'desc'], true)) {
            throw new InvalidArgumentException('Sort direction must be "asc" or "desc", not "'.$direction.'".');
        }

        $query = clone $this;
        $query->sort = ($direction === 'desc' ? '-' : '+').$field;

        return $query;
    }

    public function offset(?int $offset): self
    {
        if ($offset !== null && $offset < 0) {
            throw new InvalidArgumentException('The offset cannot be negative.');
        }

        $query = clone $this;
        $query->offset = $offset;

        return $query;
    }

    public function limit(?int $limit): self
    {
        if ($limit !== null && ($limit < 1 || $limit > 1000)) {
            throw new InvalidArgumentException('ClearPass returns between 1 and 1000 records at a time.');
        }

        $query = clone $this;
        $query->limit = $limit;

        return $query;
    }

    public function calculateCount(bool $calculateCount = true): self
    {
        $query = clone $this;
        $query->calculateCount = $calculateCount;

        return $query;
    }

    /**
     * The query without its paging, for a paginator to page itself.
     */
    public function withoutPaging(): self
    {
        return $this->offset(null)->limit(null);
    }

    public function getSort(): ?string
    {
        return $this->sort;
    }

    public function getOffset(): ?int
    {
        return $this->offset;
    }

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function countsRecords(): bool
    {
        return $this->calculateCount;
    }

    /**
     * The query parameters ClearPass reads.
     *
     * @return array<string, string|int>
     */
    public function toArray(): array
    {
        $query = [];

        if (! $this->filter->isEmpty()) {
            $query['filter'] = $this->filter->toJson();
        }

        if ($this->sort !== null) {
            $query['sort'] = $this->sort;
        }

        if ($this->offset !== null) {
            $query['offset'] = $this->offset;
        }

        if ($this->limit !== null) {
            $query['limit'] = $this->limit;
        }

        if ($this->calculateCount) {
            $query['calculate_count'] = 'true';
        }

        return $query;
    }

    /**
     * The query string as you would read it, unencoded, for logs and debugging.
     */
    public function __toString(): string
    {
        return urldecode(http_build_query($this->toArray()));
    }
}
