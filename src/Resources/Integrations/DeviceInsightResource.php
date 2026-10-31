<?php

namespace spkm\ClearPass\Resources\Integrations;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Integrations\DeviceInsight;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\Integrations\DeviceInsight\CreateDeviceInsightRequest;
use spkm\ClearPass\Requests\Integrations\DeviceInsight\GetDeviceInsightRequest;
use spkm\ClearPass\Resources\SingletonResource;

/**
 * Manage Device Insight Integration, from ClearPass::integrations()->deviceInsight().
 *
 * @extends SingletonResource<DeviceInsight>
 */
class DeviceInsightResource extends SingletonResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, DeviceInsight::class);
    }

    protected function getRequest(array $options): ClearPassRequest
    {
        return new GetDeviceInsightRequest;
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateDeviceInsightRequest($body, $options);
    }
}
