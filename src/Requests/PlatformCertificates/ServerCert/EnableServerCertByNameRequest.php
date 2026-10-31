<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\ServerCert;

use Saloon\Enums\Method;
use spkm\ClearPass\Data\PlatformCertificates\ServerCert;
use spkm\ClearPass\Requests\ActionRequest;

/**
 * Update a server certificate: PATCH /server-cert/name/{server_uuid}/{service_name}/enable.
 */
class EnableServerCertByNameRequest extends ActionRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = ServerCert::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serverUuid, protected string $serviceName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/server-cert/name/'.rawurlencode((string) $this->serverUuid).'/'.rawurlencode((string) $this->serviceName).'/enable';
    }
}
