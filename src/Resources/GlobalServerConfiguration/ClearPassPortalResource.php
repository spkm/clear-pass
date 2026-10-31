<?php

namespace spkm\ClearPass\Resources\GlobalServerConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\GlobalServerConfiguration\ClearPassPortal;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\ClearPassPortal\CreateClearPassPortalRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\ClearPassPortal\GetClearPassPortalRequest;
use spkm\ClearPass\Resources\SingletonResource;

/**
 * Manage ClearPass portal, from ClearPass::globalServerConfiguration()->clearPassPortal().
 *
 * @extends SingletonResource<ClearPassPortal>
 */
class ClearPassPortalResource extends SingletonResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, ClearPassPortal::class);
    }

    protected function getRequest(array $options): ClearPassRequest
    {
        return new GetClearPassPortalRequest;
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateClearPassPortalRequest($body, $options);
    }
}
