<?php

namespace spkm\ClearPass\Resources\Identities;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\Identities\Endpoint;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\Identities\Endpoint\CreateEndpointRequest;
use spkm\ClearPass\Requests\Identities\Endpoint\DeleteEndpointByMacAddressRequest;
use spkm\ClearPass\Requests\Identities\Endpoint\DeleteEndpointRequest;
use spkm\ClearPass\Requests\Identities\Endpoint\GetEndpointByMacAddressRequest;
use spkm\ClearPass\Requests\Identities\Endpoint\GetEndpointRequest;
use spkm\ClearPass\Requests\Identities\Endpoint\GetEndpointsRequest;
use spkm\ClearPass\Requests\Identities\Endpoint\ReplaceEndpointByMacAddressRequest;
use spkm\ClearPass\Requests\Identities\Endpoint\ReplaceEndpointRequest;
use spkm\ClearPass\Requests\Identities\Endpoint\UpdateEndpointByMacAddressRequest;
use spkm\ClearPass\Requests\Identities\Endpoint\UpdateEndpointRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage endpoints, from ClearPass::identities()->endpoints().
 *
 * @extends Builder<Endpoint>
 */
class EndpointResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, Endpoint::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetEndpointsRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateEndpointRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetEndpointRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateEndpointRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceEndpointRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteEndpointRequest((int) $id, $options);
    }

    /**
     * Get an endpoint by mac_address: GET /endpoint/mac-address/{mac_address}.
     */
    public function findByMacAddress(string $macAddress): ?Endpoint
    {
        return $this->fetchOrNull(new GetEndpointByMacAddressRequest($macAddress));
    }

    /**
     * Update some fields of an endpoint by mac_address: PATCH /endpoint/mac-address/{mac_address}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByMacAddress(string $macAddress, array|Data $attributes = [], array $options = []): ?Endpoint
    {
        return $this->fetch(new UpdateEndpointByMacAddressRequest($macAddress, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace an endpoint by mac_address: PUT /endpoint/mac-address/{mac_address}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByMacAddress(string $macAddress, array|Data $attributes = [], array $options = []): ?Endpoint
    {
        return $this->fetch(new ReplaceEndpointByMacAddressRequest($macAddress, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete an endpoint by mac_address: DELETE /endpoint/mac-address/{mac_address}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByMacAddress(string $macAddress, array $options = []): bool
    {
        $this->fetch(new DeleteEndpointByMacAddressRequest($macAddress, $options));

        return true;
    }
}
