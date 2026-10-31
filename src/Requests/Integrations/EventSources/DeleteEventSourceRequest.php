<?php

namespace spkm\ClearPass\Requests\Integrations\EventSources;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an event source: DELETE /event-sources/{event_sources_id}.
 */
class DeleteEventSourceRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $eventSourcesId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/event-sources/'.$this->eventSourcesId;
    }
}
