<?php

namespace spkm\ClearPass\Requests\PolicyElements\NetworkDevice;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a network device by name: DELETE /network-device/name/{name}.
 */
class DeleteNetworkDeviceByNameRequest extends DeleteRequest
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
        return '/network-device/name/'.rawurlencode((string) $this->name);
    }
}
