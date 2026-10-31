<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\ServerCert;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PlatformCertificates\ServerCert;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update a server certificate: PATCH /server-cert/{service_id}.
 */
class UpdateServerCertRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = ServerCert::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $serviceId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/server-cert/'.rawurlencode((string) $this->serviceId);
    }
}
