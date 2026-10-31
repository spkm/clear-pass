<?php

namespace spkm\ClearPass\Requests\Integrations\EventSources;

use spkm\ClearPass\Data\Integrations\EventSources;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an event source by name: GET /event-sources/name/{name}.
 */
class GetEventSourceByNameRequest extends ItemRequest
{
    protected ?string $dto = EventSources::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/event-sources/name/'.rawurlencode((string) $this->name);
    }
}
