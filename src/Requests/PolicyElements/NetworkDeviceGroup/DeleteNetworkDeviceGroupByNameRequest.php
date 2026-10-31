<?php

namespace spkm\ClearPass\Requests\PolicyElements\NetworkDeviceGroup;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a network device group by name: DELETE /network-device-group/name/{name}.
 */
class DeleteNetworkDeviceGroupByNameRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-device-group/name/'.rawurlencode((string) $this->name);
    }
}
