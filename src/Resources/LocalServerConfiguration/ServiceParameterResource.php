<?php

namespace spkm\ClearPass\Resources\LocalServerConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\LocalServerConfiguration\ServiceParameter;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\LocalServerConfiguration\ServiceParameter\GetServiceParameterRequest;
use spkm\ClearPass\Requests\LocalServerConfiguration\ServiceParameter\UpdateServiceParameterRequest;
use spkm\ClearPass\Resources\SingletonResource;

/**
 * Manage service parameters, from ClearPass::localServerConfiguration()->serviceParameter().
 *
 * @extends SingletonResource<ServiceParameter>
 */
class ServiceParameterResource extends SingletonResource
{
    public function __construct(ClearPassConnector $connector, protected string $serverUuid, protected int $serviceId)
    {
        parent::__construct($connector, ServiceParameter::class);
    }

    protected function getRequest(array $options): ClearPassRequest
    {
        return new GetServiceParameterRequest($this->serverUuid, $this->serviceId);
    }

    protected function updateRequest(array $body, array $options): ClearPassRequest
    {
        return new UpdateServiceParameterRequest($this->serverUuid, $this->serviceId, $body, $options);
    }
}
