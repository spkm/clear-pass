<?php

namespace spkm\ClearPass\Requests\Logs\SystemEvents;

use spkm\ClearPass\Data\Logs\SystemEvents;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a list of system events: GET /system-event.
 */
class GetSystemEventRequest extends ItemRequest
{
    protected ?string $dto = SystemEvents::class;

    public function resolveEndpoint(): string
    {
        return '/system-event';
    }
}
