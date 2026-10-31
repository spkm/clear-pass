<?php

namespace spkm\ClearPass\Requests\Integrations\DeviceInsight;

use spkm\ClearPass\Data\Integrations\DeviceInsight;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get Device Insight Integration details: GET /device-insight.
 */
class GetDeviceInsightRequest extends ItemRequest
{
    protected ?string $dto = DeviceInsight::class;

    public function resolveEndpoint(): string
    {
        return '/device-insight';
    }
}
