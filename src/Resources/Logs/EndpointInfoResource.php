<?php

namespace spkm\ClearPass\Resources\Logs;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Logs\EndpointInfo;
use spkm\ClearPass\Requests\Logs\EndpointInfo\GetEndpointInfoByIpRangeRequest;
use spkm\ClearPass\Requests\Logs\EndpointInfo\GetEndpointInfoByIpRequest;
use spkm\ClearPass\Requests\Logs\EndpointInfo\GetEndpointInfoByMacRequest;
use spkm\ClearPass\Requests\Logs\EndpointInfo\GetEndpointInfoByTimeRangeRequest;
use spkm\ClearPass\Resources\BaseResource;

/**
 * Collection of endpoints, from ClearPass::logs()->endpointInfo().
 *
 * @extends BaseResource<EndpointInfo>
 */
class EndpointInfoResource extends BaseResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, EndpointInfo::class);
    }

    /**
     * Get a single endpoint by MAC address: GET /insight/endpoint/mac/{mac}.
     */
    public function findByMac(string $mac): ?EndpointInfo
    {
        return $this->fetchOrNull(new GetEndpointInfoByMacRequest($mac));
    }

    /**
     * Look up endpoints by IP address: GET /insight/endpoint/ip/{ip}.
     */
    public function findByIp(string $ip): ?EndpointInfo
    {
        return $this->fetchOrNull(new GetEndpointInfoByIpRequest($ip));
    }

    /**
     * Look up endpoints by IP address range: GET /insight/endpoint/ip-range/{ip_range}.
     */
    public function findByIpRange(string $ipRange): ?EndpointInfo
    {
        return $this->fetchOrNull(new GetEndpointInfoByIpRangeRequest($ipRange));
    }

    /**
     * Look up endpoints by time range: GET /insight/endpoint/time-range/{from_time}/{to_time}.
     */
    public function findByTimeRange(string $fromTime, string $toTime): ?EndpointInfo
    {
        return $this->fetchOrNull(new GetEndpointInfoByTimeRangeRequest($fromTime, $toTime));
    }
}
