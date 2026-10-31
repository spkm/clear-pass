<?php

namespace spkm\ClearPass\Requests\CertificateAuthority\CertificateReject;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\CertificateAuthority\Certificate;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Reject a certificate signing request: POST /certificate/{cert_id}/reject.
 */
class RejectCertificateRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = Certificate::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $certId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/certificate/'.rawurlencode((string) $this->certId).'/reject';
    }
}
