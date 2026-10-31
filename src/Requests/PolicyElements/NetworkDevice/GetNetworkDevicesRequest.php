<?php

namespace spkm\ClearPass\Requests\PolicyElements\NetworkDevice;

use spkm\ClearPass\Data\PolicyElements\NetworkDevice;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of network devices: GET /network-device.
 */
class GetNetworkDevicesRequest extends ListRequest
{
    protected ?string $dto = NetworkDevice::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-device';
    }
}
