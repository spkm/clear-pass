<?php

namespace spkm\ClearPass\Resources\CertificateAuthority;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\CertificateAuthority\OnboardDevice;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\CertificateAuthority\OnboardDevice\DeleteOnboardDeviceRequest;
use spkm\ClearPass\Requests\CertificateAuthority\OnboardDevice\GetOnboardDeviceRequest;
use spkm\ClearPass\Requests\CertificateAuthority\OnboardDevice\GetOnboardDevicesRequest;
use spkm\ClearPass\Requests\CertificateAuthority\OnboardDevice\UpdateOnboardDeviceRequest;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage Onboard devices, from ClearPass::certificateAuthority()->onboardDevices().
 *
 * @extends Builder<OnboardDevice>
 */
class OnboardDeviceResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, OnboardDevice::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetOnboardDevicesRequest($query);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetOnboardDeviceRequest($id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateOnboardDeviceRequest($id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteOnboardDeviceRequest($id, $options);
    }
}
