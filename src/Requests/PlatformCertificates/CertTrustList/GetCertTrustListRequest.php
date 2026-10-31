<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\CertTrustList;

use spkm\ClearPass\Data\PlatformCertificates\CertTrustList;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a certificate trust list: GET /cert-trust-list/{cert_trust_list_id}.
 */
class GetCertTrustListRequest extends ItemRequest
{
    protected ?string $dto = CertTrustList::class;

    public function __construct(protected int|string $certTrustListId) {}

    public function resolveEndpoint(): string
    {
        return '/cert-trust-list/'.rawurlencode((string) $this->certTrustListId);
    }
}
