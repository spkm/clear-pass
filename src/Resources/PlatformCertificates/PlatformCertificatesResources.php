<?php

namespace spkm\ClearPass\Resources\PlatformCertificates;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\PlatformCertificates\CertSignRequest;
use spkm\ClearPass\Data\PlatformCertificates\SelfSignedCert;
use spkm\ClearPass\Requests\PlatformCertificates\CertSignRequest\CreateCertSigningRequest;
use spkm\ClearPass\Requests\PlatformCertificates\SelfSignedCert\CreateSelfSignedCertRequest;
use spkm\ClearPass\Resources\BaseResource;

/**
 * The PlatformCertificates API: ClearPass::platformCertificates().
 *
 * @extends BaseResource<Data>
 */
class PlatformCertificatesResources extends BaseResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Manage Certificate Trust List details.
     */
    public function certTrustListDetails(): CertTrustListDetailsResource
    {
        return new CertTrustListDetailsResource($this->connector);
    }

    /**
     * Manage Certificate Trust List.
     */
    public function certTrustLists(): CertTrustListResource
    {
        return new CertTrustListResource($this->connector);
    }

    /**
     * Manage Client Certificates.
     */
    public function clientCerts(): ClientCertResource
    {
        return new ClientCertResource($this->connector);
    }

    /**
     * Post a certificate sign request: POST /cert-sign-request.
     *
     * @param  array<string, mixed>|Data  $body
     * @param  array<string, mixed>  $options
     */
    public function createCertSigning(array|Data $body = [], array $options = []): ?CertSignRequest
    {
        return $this->fetch(new CreateCertSigningRequest($this->payloadOf($body), $options));
    }

    /**
     * Create a Self-Signed Certificate: POST /self-signed-cert.
     *
     * @param  array<string, mixed>|Data  $body
     * @param  array<string, mixed>  $options
     */
    public function createSelfSignedCert(array|Data $body = [], array $options = []): ?SelfSignedCert
    {
        return $this->fetch(new CreateSelfSignedCertRequest($this->payloadOf($body), $options));
    }

    /**
     * Manage Revocation Certificate List.
     */
    public function revocationLists(): RevocationListResource
    {
        return new RevocationListResource($this->connector);
    }

    /**
     * Manage Server Certificates.
     */
    public function serverCerts(): ServerCertResource
    {
        return new ServerCertResource($this->connector);
    }

    /**
     * Manage Service Certificates.
     */
    public function serviceCerts(): ServiceCertResource
    {
        return new ServiceCertResource($this->connector);
    }
}
