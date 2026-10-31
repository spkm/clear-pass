<?php

namespace spkm\ClearPass\Requests\CertificateAuthority\CertificateExport;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\CertificateAuthority\CertificateExportResponse;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Export a certificate or certificate signing request: POST /certificate/{cert_id}/export.
 */
class ExportCertificateRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = CertificateExportResponse::class;

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
        return '/certificate/'.rawurlencode((string) $this->certId).'/export';
    }
}
