<?php

namespace spkm\ClearPass\Resources\GlobalServerConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\GlobalServerConfiguration\ClusterWideParameter;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\ClusterWideParameter\GetClusterWideParameterRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\ClusterWideParameter\ReplaceClusterWideParameterRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\ClusterWideParameter\UpdateClusterWideParameterRequest;
use spkm\ClearPass\Resources\SingletonResource;

/**
 * Manage cluster wide parameters, from ClearPass::globalServerConfiguration()->clusterWideParameter().
 *
 * @extends SingletonResource<ClusterWideParameter>
 */
class ClusterWideParameterResource extends SingletonResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, ClusterWideParameter::class);
    }

    protected function getRequest(array $options): ClearPassRequest
    {
        return new GetClusterWideParameterRequest;
    }

    protected function replaceRequest(array $body, array $options): ClearPassRequest
    {
        return new ReplaceClusterWideParameterRequest($body, $options);
    }

    protected function updateRequest(array $body, array $options): ClearPassRequest
    {
        return new UpdateClusterWideParameterRequest($body, $options);
    }
}
