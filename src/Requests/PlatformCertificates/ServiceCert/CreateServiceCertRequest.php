<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\ServiceCert;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PlatformCertificates\ServiceCert;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Add a service certificate: POST /service-cert.
 */
class CreateServiceCertRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = ServiceCert::class;

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
        return '/service-cert';
    }
}
