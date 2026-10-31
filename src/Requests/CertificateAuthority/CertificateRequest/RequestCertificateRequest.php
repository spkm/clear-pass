<?php

namespace spkm\ClearPass\Requests\CertificateAuthority\CertificateRequest;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\CertificateAuthority\Certificate;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Import a certificate signing request: POST /certificate/request.
 */
class RequestCertificateRequest extends WriteRequest
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
        return '/certificate/request';
    }
}
