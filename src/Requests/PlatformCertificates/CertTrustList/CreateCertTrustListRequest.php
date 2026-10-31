<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\CertTrustList;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PlatformCertificates\CertTrustList;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Add a new certificate trust list: POST /cert-trust-list.
 */
class CreateCertTrustListRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = CertTrustList::class;

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
        return '/cert-trust-list';
    }
}
