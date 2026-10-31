<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\ClientCert;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a client certificate: DELETE /client-cert/{client_cert_id}.
 */
class DeleteClientCertRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $clientCertId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/client-cert/'.rawurlencode((string) $this->clientCertId);
    }
}
