<?php

namespace spkm\ClearPass\Requests\CertificateAuthority\CertificateNew;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\CertificateAuthority\Certificate;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new certificate signing request and private key: POST /certificate/new.
 */
class CreateCertificateRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = Certificate::class;

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
        return '/certificate/new';
    }
}
