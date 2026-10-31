<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\CertTrustListDetails;

use spkm\ClearPass\Data\PlatformCertificates\CertTrustListDetails;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a certificate trust list details: GET /cert-trust-list-details/{cert_trust_list_details_id}.
 */
class GetCertTrustListDetailRequest extends ItemRequest
{
    protected ?string $dto = CertTrustListDetails::class;

    public function __construct(protected int|string $certTrustListDetailsId) {}

    public function resolveEndpoint(): string
    {
        return '/cert-trust-list-details/'.rawurlencode((string) $this->certTrustListDetailsId);
    }
}
