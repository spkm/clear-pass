<?php

namespace spkm\ClearPass\Requests\Identities\Device;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a device account: DELETE /device/{device_id}.
 */
class DeleteDeviceRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: change_of_authorization
     */
    public function __construct(protected int|string $deviceId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/device/'.rawurlencode((string) $this->deviceId);
    }
}
