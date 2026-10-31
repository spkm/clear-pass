<?php

namespace spkm\ClearPass\Resources\EnforcementProfile;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\EnforcementProfile\NetDestination;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NetDestination\CreateNetDestinationRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NetDestination\DeleteNetDestinationByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NetDestination\DeleteNetDestinationRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NetDestination\GetNetDestinationByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NetDestination\GetNetDestinationRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NetDestination\GetNetDestinationsRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NetDestination\ReplaceNetDestinationByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NetDestination\ReplaceNetDestinationRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NetDestination\UpdateNetDestinationByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\NetDestination\UpdateNetDestinationRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage Net Destination, from ClearPass::enforcementProfile()->netDestinations().
 *
 * @extends Builder<NetDestination>
 */
class NetDestinationResource extends Builder
{
    public function __construct(ClearPassConnector $connector, protected string $productName)
    {
        parent::__construct($connector, NetDestination::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetNetDestinationsRequest($this->productName, $query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateNetDestinationRequest($this->productName, $body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetNetDestinationRequest($this->productName, (int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateNetDestinationRequest($this->productName, (int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceNetDestinationRequest($this->productName, (int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteNetDestinationRequest($this->productName, (int) $id, $options);
    }

    /**
     * Get a Net Destination by name: GET /enforcement-profile-dur/net-destination/{product_name}/name/{name}.
     */
    public function findByName(string $name): ?NetDestination
    {
        return $this->fetchOrNull(new GetNetDestinationByNameRequest($this->productName, $name));
    }

    /**
     * Update some fields of a Net Destination by name: PATCH /enforcement-profile-dur/net-destination/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?NetDestination
    {
        return $this->fetch(new UpdateNetDestinationByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a Net Destination by name: PUT /enforcement-profile-dur/net-destination/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?NetDestination
    {
        return $this->fetch(new ReplaceNetDestinationByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a Net Destination by name: DELETE /enforcement-profile-dur/net-destination/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteNetDestinationByNameRequest($this->productName, $name, $options));

        return true;
    }
}
