<?php

namespace spkm\ClearPass\Requests;

use Illuminate\Support\Facades\Cache;
use JsonException;
use Saloon\CachePlugin\Contracts\Cacheable;
use Saloon\CachePlugin\Contracts\Driver;
use Saloon\CachePlugin\Drivers\LaravelCacheDriver;
use Saloon\CachePlugin\Traits\HasCaching;
use Saloon\Enums\Method;
use Saloon\Http\PendingRequest;
use Saloon\Http\Request;
use Saloon\Http\Response;
use spkm\ClearPass\ClearPassApiException;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Exceptions\ServerErrorException;
use spkm\ClearPass\Support\Payload;

/**
 * What every request to ClearPass shares: the shape of the response and the model it maps to (for dto()), and
 * optional response caching.
 */
abstract class ClearPassRequest extends Request implements Cacheable
{
    use HasCaching;

    public const ONE = 'one';

    public const LIST = 'list';

    public const RAW = 'raw';

    public const NONE = 'none';

    protected string $responseShape = self::NONE;

    /** @var class-string<Data>|null */
    protected ?string $dto = null;

    protected bool $cacheable = false;

    protected bool $safe = true;

    public function resolveCacheDriver(): Driver
    {
        return new LaravelCacheDriver(Cache::store(config('clearpass.cache.store')));
    }

    public function cacheExpiryInSeconds(): int
    {
        return (int) config('clearpass.cache.seconds', 3600);
    }

    /**
     * @return array<Method>
     */
    protected function getCacheableMethods(): array
    {
        return $this->cacheable && config('clearpass.cache.enabled') ? [Method::GET] : [];
    }

    protected function cacheKey(PendingRequest $pendingRequest): string
    {
        return 'clearpass.response.'.sha1($pendingRequest->getMethod()->value.' '.$pendingRequest->getUri());
    }

    /**
     * Whether the request can be retried: a GET that changes nothing.
     */
    public function isSafe(): bool
    {
        return $this->safe && $this->getMethod() === Method::GET;
    }

    /**
     * @return class-string<Data>|null
     */
    public function dtoClass(): ?string
    {
        return $this->dto;
    }

    public function responseShape(): string
    {
        return $this->responseShape;
    }

    /**
     * The response as the request's model (or models, or arrays for a request without one), null for an answer
     * without a body (204, or 304 for an update that changed nothing), or a ClearPassApiException for an error.
     */
    public function createDtoFromResponse(Response $response): mixed
    {
        if (! $response->successful() && $response->status() !== 304) {
            throw ClearPassApiException::fromResponse($response);
        }

        if ($response->status() === 304 || trim($response->body()) === '') {
            return null;
        }

        try {
            return match ($this->responseShape) {
                self::ONE => Payload::object($response, $this->dto),
                self::LIST => Payload::items($response, $this->dto),
                self::RAW => Payload::json($response),
                default => null,
            };
        } catch (JsonException) {
            // A successful status with something other than JSON, such as a proxy's or maintenance page.
            throw new ServerErrorException($response);
        }
    }
}
