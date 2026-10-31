<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\CertTrustList;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PlatformCertificates\CertTrustList;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Enbale certificate trust list: PATCH /cert-trust-list/{cert_trust_list_id}.
 */
class UpdateCertTrustListRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = CertTrustList::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $certTrustListId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/cert-trust-list/'.rawurlencode((string) $this->certTrustListId);
    }
}
