<?php

namespace spkm\ClearPass\Resources;

use JsonException;
use spkm\ClearPass\ClearPassApiException;
use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Exceptions\NotFoundException;
use spkm\ClearPass\Exceptions\ServerErrorException;
use spkm\ClearPass\Requests\ClearPassRequest;

/**
 * What every resource shares: its connector, the model its records are returned as, and sending a request for its
 * model.
 *
 * @template TData of Data
 */
abstract class BaseResource
{
    /**
     * @param  class-string<TData>|null  $dataClass  The model records are returned as; null for arrays.
     */
    public function __construct(protected ClearPassConnector $connector, protected ?string $dataClass) {}

    public function connector(): ClearPassConnector
    {
        return $this->connector;
    }

    /**
     * Send a request and return what ClearPass answered as the request's model, throwing for an error status.
     */
    protected function fetch(ClearPassRequest $request): mixed
    {
        $response = $this->connector->send($request);

        if (! $response->successful() && $response->status() !== 304) {
            throw ClearPassApiException::fromResponse($response);
        }

        try {
            return $response->dto();
        } catch (JsonException) {
            throw new ServerErrorException($response);
        }
    }

    /**
     * As fetch(), but null when ClearPass has no such record.
     */
    protected function fetchOrNull(ClearPassRequest $request): mixed
    {
        try {
            return $this->fetch($request);
        } catch (NotFoundException) {
            return null;
        }
    }

    /**
     * @param  array<string, mixed>|Data  $attributes
     * @return array<string, mixed>
     */
    protected function payloadOf(array|Data $attributes): array
    {
        return $attributes instanceof Data ? $attributes->toArray() : $attributes;
    }

    /**
     * How dates are written in this resource's filters and records.
     */
    protected function dateFormat(): string
    {
        return $this->dataClass === null ? DATE_ATOM : $this->dataClass::dateFormat();
    }
}
