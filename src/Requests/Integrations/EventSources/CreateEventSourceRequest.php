<?php

namespace spkm\ClearPass\Requests\Integrations\EventSources;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Integrations\EventSources;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new event source: POST /event-sources.
 */
class CreateEventSourceRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = EventSources::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/event-sources';
    }
}
