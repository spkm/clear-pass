<?php

namespace spkm\ClearPass\Requests\Identities\Device;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a device account by MAC address: DELETE /device/mac/{macaddr}.
 */
class DeleteDeviceByMacRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: change_of_authorization
     */
    public function __construct(protected string $macaddr, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/device/mac/'.rawurlencode((string) $this->macaddr);
    }
}
