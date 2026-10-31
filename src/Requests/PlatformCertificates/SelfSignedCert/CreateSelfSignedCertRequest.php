<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\SelfSignedCert;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PlatformCertificates\SelfSignedCert;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a Self-Signed Certificate: POST /self-signed-cert.
 */
class CreateSelfSignedCertRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = SelfSignedCert::class;

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
        return '/self-signed-cert';
    }
}
