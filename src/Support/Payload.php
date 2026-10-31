<?php

namespace spkm\ClearPass\Support;

use Illuminate\Support\Collection;
use Saloon\Http\Response;
use spkm\ClearPass\Data\Data;
use UnexpectedValueException;

/**
 * Reads ClearPass's response bodies: a HAL list ({"_embedded": {"items": [...]}, "_links": {...}, "count": n}), a
 * bare list, or one record as a bare object.
 */
final class Payload
{
    /**
     * The decoded JSON body, or null when the body is empty. Throws JsonException for anything that isn't JSON.
     */
    public static function json(Response $response): mixed
    {
        $body = $response->body();

        return trim($body) === '' ? null : json_decode($body, true, flags: JSON_THROW_ON_ERROR);
    }

    /**
     * The records in the response, as arrays.
     *
     * @return list<array<string, mixed>>
     */
    public static function records(Response $response): array
    {
        $json = self::json($response);

        if ($json === null || $json === []) {
            return [];
        }

        if (! is_array($json)) {
            throw new UnexpectedValueException("ClearPass's response to ".self::requestLine($response).' is not a record or a list of records.');
        }

        if (array_is_list($json)) {
            return self::onlyArrays($json);
        }

        $items = $json['_embedded']['items'] ?? $json['items'] ?? null;

        if (is_array($items) && array_is_list($items)) {
            return self::onlyArrays($items);
        }

        return [$json];
    }

    /**
     * The records as models of the request's class, or as arrays when it has none.
     *
     * @param  class-string<Data>|null  $dto
     * @return Collection<int, Data|array<string, mixed>>
     */
    public static function items(Response $response, ?string $dto): Collection
    {
        return collect(self::records($response))->map(fn (array $item) => $dto === null ? $item : $dto::from($item));
    }

    /**
     * The one record in the response, or null when ClearPass sent nothing.
     *
     * @param  class-string<Data>|null  $dto
     * @return Data|array<string, mixed>|null
     */
    public static function object(Response $response, ?string $dto): mixed
    {
        $record = self::records($response)[0] ?? null;

        return $record === null || $dto === null ? $record : $dto::from($record);
    }

    /**
     * The total ClearPass gives a list asked for with calculate_count.
     */
    public static function count(Response $response): int
    {
        $json = self::json($response);
        $count = is_array($json) ? ($json['count'] ?? null) : null;

        if (! is_int($count) && ! (is_string($count) && ctype_digit($count))) {
            throw new UnexpectedValueException("ClearPass's response to ".self::requestLine($response).' has no count; ask for one with calculate_count.');
        }

        return (int) $count;
    }

    /**
     * @param  list<mixed>  $items
     * @return list<array<string, mixed>>
     */
    private static function onlyArrays(array $items): array
    {
        return array_values(array_filter($items, fn (mixed $item) => is_array($item)));
    }

    private static function requestLine(Response $response): string
    {
        $pendingRequest = $response->getPendingRequest();

        return $pendingRequest->getMethod()->value.' '.(parse_url($pendingRequest->getUrl(), PHP_URL_PATH) ?: '/');
    }
}
