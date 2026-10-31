<?php

namespace spkm\ClearPass\Requests\Integrations\EventSources;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Integrations\EventSources;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace an event source: PUT /event-sources/{event_sources_id}.
 */
class ReplaceEventSourceRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = EventSources::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $eventSourcesId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/event-sources/'.$this->eventSourcesId;
    }
}
