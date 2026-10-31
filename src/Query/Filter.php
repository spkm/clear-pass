<?php

namespace spkm\ClearPass\Query;

use BackedEnum;
use DateTimeInterface;
use InvalidArgumentException;
use JsonSerializable;
use Stringable;

/**
 * A ClearPass JSON filter expression, built up immutably. Conditions on fields are ANDed; or(), and() and not()
 * nest further expressions as {"$or": [...]}, {"$and": [...]} and {"$not": {...}}.
 */
final class Filter implements JsonSerializable, Stringable
{
    /** @var list<array{field: string, operator: Operator, value: mixed, options: ?string}|array{group: string, filters: list<Filter>}> */
    private array $clauses = [];

    /**
     * @param  string  $dateFormat  How dates in conditions are written: ISO 8601, or 'U' for Unix timestamps.
     */
    public function __construct(private string $dateFormat = DATE_ATOM) {}

    public static function make(string $dateFormat = DATE_ATOM): self
    {
        return new self($dateFormat);
    }

    /**
     * A condition on a field, ANDed with the ones before it.
     *
     * @param  string|null  $options  Regex options, such as 'i' for a case-insensitive match.
     */
    public function where(string $field, Operator|string $operator, mixed $value = null, ?string $options = null): self
    {
        $filter = clone $this;
        $filter->clauses[] = ['field' => self::field($field), 'operator' => Operator::parse($operator), 'value' => $value, 'options' => $options];

        return $filter;
    }

    /**
     * Everything so far, OR the given expressions.
     */
    public function or(Filter ...$filters): self
    {
        $filter = clone $this;
        $existing = $this->isEmpty() ? [] : [clone $this];
        $filter->clauses = [['group' => '$or', 'filters' => [...$existing, ...array_values($filters)]]];

        return $filter;
    }

    /**
     * The given expressions, ANDed with everything so far.
     */
    public function and(Filter ...$filters): self
    {
        $filter = clone $this;
        $filter->clauses[] = ['group' => '$and', 'filters' => array_values($filters)];

        return $filter;
    }

    /**
     * The negation of an expression, ANDed with everything so far.
     */
    public function not(Filter $negated): self
    {
        $filter = clone $this;
        $filter->clauses[] = ['group' => '$not', 'filters' => [$negated]];

        return $filter;
    }

    public function isEmpty(): bool
    {
        return $this->clauses === [];
    }

    /**
     * The expression as ClearPass reads it.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $objects = [];

        foreach ($this->clauses as $clause) {
            if (isset($clause['group'])) {
                $compiled = array_map(fn (Filter $filter) => $filter->toArray(), $clause['filters']);
                $objects[] = $clause['group'] === '$not' ? ['$not' => $compiled[0] ?? []] : [$clause['group'] => $compiled];

                continue;
            }

            $value = $this->format($clause['operator'], $clause['value']);
            $objects[] = [$clause['field'] => $clause['operator'] === Operator::Equal && $clause['options'] === null
                ? $value
                : [$clause['operator']->value => $value] + ($clause['options'] !== null ? ['$options' => $clause['options']] : [])];
        }

        return self::merge($objects);
    }

    public function toJson(): string
    {
        return json_encode($this->toArray() ?: (object) [], JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function __toString(): string
    {
        return $this->toJson();
    }

    /**
     * One object from several, where ClearPass reads one: conditions on different fields side by side, and
     * different operators on one field in one object; anything else is ANDed explicitly.
     *
     * @param  list<array<string, mixed>>  $objects
     * @return array<string, mixed>
     */
    private static function merge(array $objects): array
    {
        if (count($objects) <= 1) {
            return $objects[0] ?? [];
        }

        $merged = [];

        foreach ($objects as $object) {
            foreach ($object as $key => $condition) {
                if (! array_key_exists($key, $merged)) {
                    $merged[$key] = $condition;

                    continue;
                }

                if (self::isOperators($merged[$key]) && self::isOperators($condition) && array_intersect_key($merged[$key], $condition) === []) {
                    $merged[$key] = [...$merged[$key], ...$condition];

                    continue;
                }

                return ['$and' => $objects];
            }
        }

        return $merged;
    }

    private static function isOperators(mixed $condition): bool
    {
        if (! is_array($condition) || $condition === [] || array_is_list($condition)) {
            return false;
        }

        foreach (array_keys($condition) as $key) {
            if (! is_string($key) || ! str_starts_with($key, '$')) {
                return false;
            }
        }

        return true;
    }

    private function format(Operator $operator, mixed $value): mixed
    {
        if ($operator === Operator::Exists) {
            return (bool) $value;
        }

        if ($operator->takesList()) {
            if (! is_iterable($value)) {
                throw new InvalidArgumentException('An in or not in condition needs a list of values.');
            }

            $values = array_map(fn (mixed $item) => $this->scalar($item), collect($value)->values()->all());

            if ($values === []) {
                throw new InvalidArgumentException('An in or not in condition needs at least one value.');
            }

            return $values;
        }

        return $this->scalar($value);
    }

    private function scalar(mixed $value): string|int|float|bool
    {
        if ($value instanceof BackedEnum) {
            $value = $value->value;
        }

        return match (true) {
            $value === null => throw new InvalidArgumentException('A condition needs a value; use whereNull() for a field without one.'),
            is_bool($value), is_int($value), is_float($value), is_string($value) => $value,
            $value instanceof DateTimeInterface => $this->dateFormat === 'U' ? (int) $value->format('U') : $value->format($this->dateFormat),
            $value instanceof Stringable => (string) $value,
            default => throw new InvalidArgumentException('A condition value must be a string, number, bool, date or enum.'),
        };
    }

    private static function field(string $field): string
    {
        if (! preg_match('/^[A-Za-z_][\w.:-]*$/', $field)) {
            throw new InvalidArgumentException('"'.$field.'" is not a ClearPass field name.');
        }

        return $field;
    }
}
