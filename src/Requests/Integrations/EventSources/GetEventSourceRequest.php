<?php

namespace spkm\ClearPass\Requests\Integrations\EventSources;

use spkm\ClearPass\Data\Integrations\EventSources;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an event source: GET /event-sources/{event_sources_id}.
 */
class GetEventSourceRequest extends ItemRequest
{
    protected ?string $dto = EventSources::class;

    public function __construct(protected int $eventSourcesId) {}

    public function resolveEndpoint(): string
    {
        return '/event-sources/'.$this->eventSourcesId;
    }
}
