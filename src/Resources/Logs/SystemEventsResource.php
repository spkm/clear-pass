<?php

namespace spkm\ClearPass\Resources\Logs;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Logs\SystemEvents;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\Logs\SystemEvents\CreateSystemEventRequest;
use spkm\ClearPass\Requests\Logs\SystemEvents\GetSystemEventRequest;
use spkm\ClearPass\Resources\SingletonResource;

/**
 * Collection of system events, from ClearPass::logs()->systemEvents().
 *
 * @extends SingletonResource<SystemEvents>
 */
class SystemEventsResource extends SingletonResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, SystemEvents::class);
    }

    protected function getRequest(array $options): ClearPassRequest
    {
        return new GetSystemEventRequest;
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateSystemEventRequest($body, $options);
    }
}
