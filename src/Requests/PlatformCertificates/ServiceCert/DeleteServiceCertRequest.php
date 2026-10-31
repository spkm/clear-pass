<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\ServiceCert;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a service certificate: DELETE /service-cert/{service_cert_id}.
 */
class DeleteServiceCertRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $serviceCertId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/service-cert/'.rawurlencode((string) $this->serviceCertId);
    }
}
