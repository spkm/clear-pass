<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\ServerCert;

use spkm\ClearPass\Data\PlatformCertificates\ServerCert;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a server certificate: GET /server-cert/name/{server_uuid}/{service_name}.
 */
class GetServerCertByNameRequest extends ItemRequest
{
    protected ?string $dto = ServerCert::class;

    public function __construct(protected string $serverUuid, protected string $serviceName) {}

    public function resolveEndpoint(): string
    {
        return '/server-cert/name/'.rawurlencode((string) $this->serverUuid).'/'.rawurlencode((string) $this->serviceName);
    }
}
