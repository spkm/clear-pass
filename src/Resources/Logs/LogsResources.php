<?php

namespace spkm\ClearPass\Resources\Logs;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\Logs\LoginAudit;
use spkm\ClearPass\Requests\Logs\LoginAudit\GetLoginAuditRequest;
use spkm\ClearPass\Resources\BaseResource;

/**
 * The Logs API: ClearPass::logs().
 *
 * @extends BaseResource<Data>
 */
class LogsResources extends BaseResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Collection of endpoints.
     */
    public function endpointInfo(): EndpointInfoResource
    {
        return new EndpointInfoResource($this->connector);
    }

    /**
     * Get previous login details for an admin user: GET /login-audit/{name}.
     */
    public function loginAudit(string $name): ?LoginAudit
    {
        return $this->fetch(new GetLoginAuditRequest($name));
    }

    /**
     * Collection of system events.
     */
    public function systemEvents(): SystemEventsResource
    {
        return new SystemEventsResource($this->connector);
    }
}
