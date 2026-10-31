<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\ClientCert;

use spkm\ClearPass\Data\PlatformCertificates\ClientCert;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a client certificate: GET /client-cert/{client_cert_id}.
 */
class GetClientCertRequest extends ItemRequest
{
    protected ?string $dto = ClientCert::class;

    public function __construct(protected int|string $clientCertId) {}

    public function resolveEndpoint(): string
    {
        return '/client-cert/'.rawurlencode((string) $this->clientCertId);
    }
}
