<?php

namespace spkm\ClearPass\Resources\PolicyElements;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\PolicyElements\Service;
use spkm\ClearPass\Data\PolicyElements\ServiceReorder;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Requests\PolicyElements\Service\CreateServiceRequest;
use spkm\ClearPass\Requests\PolicyElements\Service\DeleteServiceByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\Service\DeleteServiceRequest;
use spkm\ClearPass\Requests\PolicyElements\Service\DisableServiceByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\Service\DisableServiceRequest;
use spkm\ClearPass\Requests\PolicyElements\Service\EnableServiceByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\Service\EnableServiceRequest;
use spkm\ClearPass\Requests\PolicyElements\Service\GetServiceByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\Service\GetServiceRequest;
use spkm\ClearPass\Requests\PolicyElements\Service\GetServicesRequest;
use spkm\ClearPass\Requests\PolicyElements\Service\ReorderServicesRequest;
use spkm\ClearPass\Requests\PolicyElements\Service\ReplaceServiceByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\Service\ReplaceServiceRequest;
use spkm\ClearPass\Requests\PolicyElements\Service\UpdateServiceByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\Service\UpdateServiceRequest;

/**
 * Manage Configuration Services, from ClearPass::policyElements()->services().
 *
 * @extends Builder<Service>
 */
class ServiceResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, Service::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetServicesRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateServiceRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetServiceRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateServiceRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceServiceRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteServiceRequest((int) $id, $options);
    }

    /**
     * Get a Service by name: GET /config/service/name/{services_name}.
     */
    public function findByName(string $servicesName): ?Service
    {
        return $this->fetchOrNull(new GetServiceByNameRequest($servicesName));
    }

    /**
     * Update some fields of a Service by name: PATCH /config/service/name/{services_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $servicesName, array|Data $attributes = [], array $options = []): ?Service
    {
        return $this->fetch(new UpdateServiceByNameRequest($servicesName, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a Service by name: PUT /config/service/name/{services_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $servicesName, array|Data $attributes = [], array $options = []): ?Service
    {
        return $this->fetch(new ReplaceServiceByNameRequest($servicesName, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a Service by name: DELETE /config/service/name/{services_name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $servicesName, array $options = []): bool
    {
        $this->fetch(new DeleteServiceByNameRequest($servicesName, $options));

        return true;
    }

    /**
     * Enable a Service: PATCH /config/service/{services_id}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enable(int $servicesId, array $options = []): ?Service
    {
        return $this->fetch(new EnableServiceRequest($servicesId, $options));
    }

    /**
     * Enable a Service by name: PATCH /config/service/name/{services_name}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enableByName(string $servicesName, array $options = []): ?Service
    {
        return $this->fetch(new EnableServiceByNameRequest($servicesName, $options));
    }

    /**
     * Disable a Service: PATCH /config/service/{services_id}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disable(int $servicesId, array $options = []): ?Service
    {
        return $this->fetch(new DisableServiceRequest($servicesId, $options));
    }

    /**
     * Disable a Service by name: PATCH /config/service/name/{services_name}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disableByName(string $servicesName, array $options = []): ?Service
    {
        return $this->fetch(new DisableServiceByNameRequest($servicesName, $options));
    }

    /**
     * Reorder Services: PATCH /config/service/reorder.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function reorder(array|Data $attributes = [], array $options = []): ?ServiceReorder
    {
        return $this->fetch(new ReorderServicesRequest($this->payloadOf($attributes), $options));
    }
}
