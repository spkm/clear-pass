<?php

namespace spkm\ClearPass\Data;

use BackedEnum;
use Carbon\CarbonImmutable;
use Carbon\Exceptions\InvalidFormatException;
use DateTimeInterface;
use Illuminate\Support\Collection;
use InvalidArgumentException;
use JsonSerializable;
use ReflectionClass;
use ReflectionNamedType;
use ReflectionParameter;

/**
 * A ClearPass record. Properties carry ClearPass's own snake_case names and types, so from() and toArray() need no
 * mapping, apart from the few names that aren't PHP identifiers (ALIASES). A model ClearPass lets carry further,
 * undocumented fields (EXTRA) keeps them in $extra and sends them back at the top level; the HAL _links a record
 * arrives with are never kept.
 */
abstract readonly class Data implements JsonSerializable
{
    /**
     * Property name => the ClearPass key it stands for, for keys that aren't PHP identifiers.
     *
     * @var array<string, string>
     */
    protected const ALIASES = [];

    /**
     * Whether ClearPass stores fields on this record beyond the documented ones, kept in $extra.
     */
    protected const EXTRA = false;

    /**
     * How dates are sent: ISO 8601, or 'U' for the Unix timestamps ClearPass Guest uses.
     */
    protected const DATE_FORMAT = DATE_ATOM;

    /**
     * The model class of each list property, keyed by property name.
     *
     * @var array<string, class-string<Data>>
     */
    protected const LISTS = [];

    /**
     * @param  array<string, mixed>  $attributes
     */
    public static function from(array $attributes): static
    {
        $arguments = [];
        $known = [];

        foreach (self::parameters(static::class) as $parameter) {
            $name = $parameter->getName();

            if ($name === 'extra' && static::EXTRA) {
                continue;
            }

            $key = static::ALIASES[$name] ?? $name;
            $known[$key] = true;
            $value = static::cast($parameter, $attributes[$key] ?? null);

            if ($value === null && ! $parameter->isDefaultValueAvailable() && ! $parameter->allowsNull()) {
                throw new InvalidArgumentException(class_basename(static::class).' needs a value for "'.$key.'".');
            }

            if ($value !== null || ! $parameter->isDefaultValueAvailable()) {
                $arguments[$name] = $value;
            }
        }

        if (static::EXTRA) {
            $arguments['extra'] = array_diff_key($attributes, $known, ['_links' => true, '_embedded' => true]);
        }

        return self::reflect(static::class)->newInstanceArgs($arguments);
    }

    /**
     * @param  iterable<array<string, mixed>>|null  $items
     * @return Collection<int, static>
     */
    public static function collect(?iterable $items): Collection
    {
        return collect($items ?? [])->map(fn (array $item) => static::from($item))->values();
    }

    /**
     * How this model's dates are formatted when sent to ClearPass.
     */
    public static function dateFormat(): string
    {
        return static::DATE_FORMAT;
    }

    /**
     * The record as ClearPass would send it: its own keys, without what is null.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $values = get_object_vars($this);
        $extra = [];

        if (static::EXTRA) {
            $extra = is_array($values['extra'] ?? null) ? $values['extra'] : [];
            unset($values['extra']);
        }

        $emptyByDefault = self::emptyByDefault(static::class);
        $result = [];

        foreach ($values as $name => $value) {
            $serialised = static::serialise($value);

            if ($serialised === null || ($serialised === [] && isset($emptyByDefault[$name]))) {
                continue;
            }

            $result[static::ALIASES[$name] ?? $name] = $serialised;
        }

        return [...$result, ...$extra];
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * A model's constructor parameters, read once per class. (A readonly class can't have static properties, so the
     * cache is a static variable.)
     *
     * @param  class-string<self>  $class
     * @return list<ReflectionParameter>
     */
    private static function parameters(string $class): array
    {
        static $parameters = [];

        return $parameters[$class] ??= self::reflect($class)->getConstructor()?->getParameters() ?? [];
    }

    /**
     * @template TModel of self
     *
     * @param  class-string<TModel>  $class
     * @return ReflectionClass<TModel>
     */
    private static function reflect(string $class): ReflectionClass
    {
        static $classes = [];

        return $classes[$class] ??= new ReflectionClass($class);
    }

    /**
     * The properties whose default serialises to an empty list, which toArray() leaves out while they are still
     * empty, keyed by name.
     *
     * @param  class-string<self>  $class
     * @return array<string, true>
     */
    private static function emptyByDefault(string $class): array
    {
        static $names = [];

        if (! isset($names[$class])) {
            $names[$class] = [];

            foreach (self::parameters($class) as $parameter) {
                if ($parameter->isDefaultValueAvailable() && static::serialise($parameter->getDefaultValue()) === []) {
                    $names[$class][$parameter->getName()] = true;
                }
            }
        }

        return $names[$class];
    }

    protected static function cast(ReflectionParameter $parameter, mixed $value): mixed
    {
        $type = $parameter->getType();
        $typeName = $type instanceof ReflectionNamedType ? $type->getName() : 'mixed';

        if ($typeName === Collection::class) {
            $class = static::LISTS[$parameter->getName()] ?? null;

            return is_iterable($value) ? collect($value)->map(fn (mixed $item) => $class && is_array($item) ? $class::from($item) : $item)->values() : null;
        }

        if ($value === null) {
            return null;
        }

        return match (true) {
            $typeName === 'int' => is_numeric($value) ? (int) $value : null,
            $typeName === 'float' => is_numeric($value) ? (float) $value : null,
            $typeName === 'bool' => is_bool($value) ? $value : filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE),
            $typeName === 'string' => is_scalar($value) ? (string) $value : null,
            $typeName === 'array' => is_array($value) ? $value : null,
            $typeName === CarbonImmutable::class => static::date($value),
            is_subclass_of($typeName, self::class) => is_array($value) ? $typeName::from($value) : null,
            default => $value,
        };
    }

    /**
     * A date as ClearPass sends it: a Unix timestamp (ClearPass Guest) or an ISO 8601 string. Zero and an empty
     * string mean no date.
     */
    protected static function date(mixed $value): ?CarbonImmutable
    {
        if (is_int($value) || (is_string($value) && ctype_digit($value))) {
            return (int) $value === 0 ? null : CarbonImmutable::createFromTimestamp((int) $value);
        }

        if (! is_string($value) || trim($value) === '') {
            return null;
        }

        try {
            return CarbonImmutable::parse($value);
        } catch (InvalidFormatException) {
            return null;
        }
    }

    protected static function serialise(mixed $value): mixed
    {
        return match (true) {
            $value instanceof self => $value->toArray(),
            $value instanceof Collection => $value->map(fn (mixed $item) => static::serialise($item))->values()->all(),
            $value instanceof DateTimeInterface => static::DATE_FORMAT === 'U' ? (int) $value->format('U') : $value->format(static::DATE_FORMAT),
            $value instanceof BackedEnum => $value->value,
            default => $value,
        };
    }
}
