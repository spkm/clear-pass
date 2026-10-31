<?php

namespace spkm\ClearPass\Requests\PolicyElements\NetworkDeviceGroup;

use spkm\ClearPass\Data\PolicyElements\NetworkDeviceGroup;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of network device groups: GET /network-device-group.
 */
class GetNetworkDeviceGroupsRequest extends ListRequest
{
    protected ?string $dto = NetworkDeviceGroup::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-device-group';
    }
}
