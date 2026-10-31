<?php

namespace spkm\ClearPass\Requests\CertificateAuthority\CertificateChain;

use spkm\ClearPass\Data\CertificateAuthority\CertificateChain;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a certificate and its trust chain: GET /certificate/{cert_id}/chain.
 */
class GetCertificateChainRequest extends ItemRequest
{
    protected ?string $dto = CertificateChain::class;

    public function __construct(protected int|string $certId) {}

    public function resolveEndpoint(): string
    {
        return '/certificate/'.rawurlencode((string) $this->certId).'/chain';
    }
}
