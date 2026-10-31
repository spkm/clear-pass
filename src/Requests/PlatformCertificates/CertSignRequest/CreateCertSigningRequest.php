<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\CertSignRequest;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PlatformCertificates\CertSignRequest;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Post a certificate sign request: POST /cert-sign-request.
 */
class CreateCertSigningRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = CertSignRequest::class;

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
        return '/cert-sign-request';
    }
}
