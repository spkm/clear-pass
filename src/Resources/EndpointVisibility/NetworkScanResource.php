<?php

namespace spkm\ClearPass\Resources\EndpointVisibility;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\EndpointVisibility\NetworkScan;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EndpointVisibility\NetworkScan\CreateNetworkScanRequest;
use spkm\ClearPass\Requests\EndpointVisibility\NetworkScan\DeleteNetworkScanRequest;
use spkm\ClearPass\Requests\EndpointVisibility\NetworkScan\DisableNetworkScanRequest;
use spkm\ClearPass\Requests\EndpointVisibility\NetworkScan\EnableNetworkScanRequest;
use spkm\ClearPass\Requests\EndpointVisibility\NetworkScan\GetNetworkScanRequest;
use spkm\ClearPass\Requests\EndpointVisibility\NetworkScan\GetNetworkScansRequest;
use spkm\ClearPass\Requests\EndpointVisibility\NetworkScan\ReplaceNetworkScanRequest;
use spkm\ClearPass\Requests\EndpointVisibility\NetworkScan\UpdateNetworkScanRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage NetworkScan Services, from ClearPass::endpointVisibility()->networkScans().
 *
 * @extends Builder<NetworkScan>
 */
class NetworkScanResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, NetworkScan::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetNetworkScansRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateNetworkScanRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetNetworkScanRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateNetworkScanRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceNetworkScanRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteNetworkScanRequest((int) $id, $options);
    }

    /**
     * Update some fields of a NetworkScan: PATCH /config/network-scan/{scan_id}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enable(int $scanId, array $options = []): ?NetworkScan
    {
        return $this->fetch(new EnableNetworkScanRequest($scanId, $options));
    }

    /**
     * Update some fields of a NetworkScan: PATCH /config/network-scan/{scan_id}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disable(int $scanId, array $options = []): ?NetworkScan
    {
        return $this->fetch(new DisableNetworkScanRequest($scanId, $options));
    }
}
