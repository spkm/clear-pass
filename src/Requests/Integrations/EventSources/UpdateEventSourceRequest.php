<?php

namespace spkm\ClearPass\Requests\Integrations\EventSources;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Integrations\EventSources;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of an event source: PATCH /event-sources/{event_sources_id}.
 */
class UpdateEventSourceRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

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
