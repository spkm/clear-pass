<?php

namespace spkm\ClearPass\Requests\CertificateAuthority\Certificate;

use spkm\ClearPass\Data\CertificateAuthority\Certificate;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a certificate or certificate signing request: GET /certificate/{certificate_id}.
 */
class GetCertificateRequest extends ItemRequest
{
    protected ?string $dto = Certificate::class;

    public function __construct(protected int|string $certificateId) {}

    public function resolveEndpoint(): string
    {
        return '/certificate/'.rawurlencode((string) $this->certificateId);
    }
}
