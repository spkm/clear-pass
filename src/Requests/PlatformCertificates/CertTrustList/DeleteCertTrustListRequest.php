<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\CertTrustList;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a certificate trust list: DELETE /cert-trust-list/{cert_trust_list_id}.
 */
class DeleteCertTrustListRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $certTrustListId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/cert-trust-list/'.rawurlencode((string) $this->certTrustListId);
    }
}
