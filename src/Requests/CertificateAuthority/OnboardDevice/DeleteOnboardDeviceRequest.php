<?php

namespace spkm\ClearPass\Requests\CertificateAuthority\OnboardDevice;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a device: DELETE /onboard/device/{id}.
 */
class DeleteOnboardDeviceRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: disconnect_active_sessions, ignore_disconnect_errors
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/onboard/device/'.rawurlencode((string) $this->id);
    }
}
