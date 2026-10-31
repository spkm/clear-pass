<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\ClientCert;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PlatformCertificates\ClientCert;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Add a client certificate: POST /client-cert.
 */
class CreateClientCertRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = ClientCert::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/client-cert';
    }
}
