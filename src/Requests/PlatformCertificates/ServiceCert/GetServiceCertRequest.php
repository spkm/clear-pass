<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\ServiceCert;

use spkm\ClearPass\Data\PlatformCertificates\ServiceCert;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a service certificate: GET /service-cert/{service_cert_id}.
 */
class GetServiceCertRequest extends ItemRequest
{
    protected ?string $dto = ServiceCert::class;

    public function __construct(protected int|string $serviceCertId) {}

    public function resolveEndpoint(): string
    {
        return '/service-cert/'.rawurlencode((string) $this->serviceCertId);
    }
}
