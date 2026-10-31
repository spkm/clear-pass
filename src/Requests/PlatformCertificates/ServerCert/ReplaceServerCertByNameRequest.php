<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\ServerCert;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PlatformCertificates\ServerCert;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Add a server certificate: PUT /server-cert/name/{server_uuid}/{service_name}.
 */
class ReplaceServerCertByNameRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = ServerCert::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serverUuid, protected string $serviceName, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/server-cert/name/'.rawurlencode((string) $this->serverUuid).'/'.rawurlencode((string) $this->serviceName);
    }
}
