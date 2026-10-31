<?php

namespace spkm\ClearPass\Resources\CertificateAuthority;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\CertificateAuthority\Certificate;
use spkm\ClearPass\Data\CertificateAuthority\CertificateChain;
use spkm\ClearPass\Data\CertificateAuthority\CertificateExportResponse;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Requests\CertificateAuthority\CertificateChain\GetCertificateChainRequest;
use spkm\ClearPass\Requests\CertificateAuthority\CertificateExport\ExportCertificateRequest;
use spkm\ClearPass\Requests\CertificateAuthority\CertificateImport\ImportCertificateRequest;
use spkm\ClearPass\Requests\CertificateAuthority\CertificateNew\CreateCertificateRequest;
use spkm\ClearPass\Requests\CertificateAuthority\CertificateReject\RejectCertificateRequest;
use spkm\ClearPass\Requests\CertificateAuthority\CertificateRequest\RequestCertificateRequest;
use spkm\ClearPass\Requests\CertificateAuthority\CertificateRevoke\RevokeCertificateRequest;
use spkm\ClearPass\Requests\CertificateAuthority\CertificateSignRequest\SignCertificateRequest;
use spkm\ClearPass\Resources\BaseResource;

/**
 * The CertificateAuthority API: ClearPass::certificateAuthority().
 *
 * @extends BaseResource<Data>
 */
class CertificateAuthorityResources extends BaseResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get a certificate and its trust chain: GET /certificate/{cert_id}/chain.
     */
    public function certificateChain(int|string $certId): ?CertificateChain
    {
        return $this->fetch(new GetCertificateChainRequest($certId));
    }

    /**
     * Manage Onboard certificates.
     */
    public function certificates(): CertificateResource
    {
        return new CertificateResource($this->connector);
    }

    /**
     * Create a new certificate signing request and private key: POST /certificate/new.
     *
     * @param  array<string, mixed>|Data  $body
     * @param  array<string, mixed>  $options
     */
    public function createCertificate(array|Data $body = [], array $options = []): ?Certificate
    {
        return $this->fetch(new CreateCertificateRequest($this->payloadOf($body), $options));
    }

    /**
     * Export a certificate or certificate signing request: POST /certificate/{cert_id}/export.
     *
     * @param  array<string, mixed>|Data  $body
     * @param  array<string, mixed>  $options
     */
    public function exportCertificate(int|string $certId, array|Data $body = [], array $options = []): ?CertificateExportResponse
    {
        return $this->fetch(new ExportCertificateRequest($certId, $this->payloadOf($body), $options));
    }

    /**
     * Import a code-signing, trusted, or CA certificate: POST /certificate/import.
     *
     * @param  array<string, mixed>|Data  $body
     * @param  array<string, mixed>  $options
     */
    public function importCertificate(array|Data $body = [], array $options = []): ?Certificate
    {
        return $this->fetch(new ImportCertificateRequest($this->payloadOf($body), $options));
    }

    /**
     * Manage Onboard devices.
     */
    public function onboardDevices(): OnboardDeviceResource
    {
        return new OnboardDeviceResource($this->connector);
    }

    /**
     * Manage Onboard users.
     */
    public function onboardUsers(): OnboardUserResource
    {
        return new OnboardUserResource($this->connector);
    }

    /**
     * Reject a certificate signing request: POST /certificate/{cert_id}/reject.
     *
     * @param  array<string, mixed>|Data  $body
     * @param  array<string, mixed>  $options
     */
    public function rejectCertificate(int|string $certId, array|Data $body = [], array $options = []): ?Certificate
    {
        return $this->fetch(new RejectCertificateRequest($certId, $this->payloadOf($body), $options));
    }

    /**
     * Import a certificate signing request: POST /certificate/request.
     *
     * @param  array<string, mixed>|Data  $body
     * @param  array<string, mixed>  $options
     */
    public function requestCertificate(array|Data $body = [], array $options = []): ?Certificate
    {
        return $this->fetch(new RequestCertificateRequest($this->payloadOf($body), $options));
    }

    /**
     * Revoke a certificate: POST /certificate/{cert_id}/revoke.
     *
     * @param  array<string, mixed>|Data  $body
     * @param  array<string, mixed>  $options
     */
    public function revokeCertificate(int|string $certId, array|Data $body = [], array $options = []): ?Certificate
    {
        return $this->fetch(new RevokeCertificateRequest($certId, $this->payloadOf($body), $options));
    }

    /**
     * Sign a certificate signing request: POST /certificate/{cert_id}/sign.
     *
     * @param  array<string, mixed>|Data  $body
     * @param  array<string, mixed>  $options
     */
    public function signCertificate(int|string $certId, array|Data $body = [], array $options = []): ?Certificate
    {
        return $this->fetch(new SignCertificateRequest($certId, $this->payloadOf($body), $options));
    }
}
