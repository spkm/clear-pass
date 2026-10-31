<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\ServerCert;

use spkm\ClearPass\Data\PlatformCertificates\ServerCert;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get server certificate: GET /server-cert/{service_id}.
 */
class GetServerCertRequest extends ItemRequest
{
    protected ?string $dto = ServerCert::class;

    public function __construct(protected int|string $serviceId) {}

    public function resolveEndpoint(): string
    {
        return '/server-cert/'.rawurlencode((string) $this->serviceId);
    }
}
