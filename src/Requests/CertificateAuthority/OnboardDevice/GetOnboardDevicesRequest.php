<?php

namespace spkm\ClearPass\Requests\CertificateAuthority\OnboardDevice;

use spkm\ClearPass\Data\CertificateAuthority\OnboardDevice;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of devices: GET /onboard/device.
 */
class GetOnboardDevicesRequest extends ListRequest
{
    protected ?string $dto = OnboardDevice::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/onboard/device';
    }
}
