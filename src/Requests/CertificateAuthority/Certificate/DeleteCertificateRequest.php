<?php

namespace spkm\ClearPass\Requests\CertificateAuthority\Certificate;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a certificate or certificate signing request: DELETE /certificate/{certificate_id}.
 */
class DeleteCertificateRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $certificateId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/certificate/'.rawurlencode((string) $this->certificateId);
    }
}
