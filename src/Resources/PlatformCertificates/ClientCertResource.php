<?php

namespace spkm\ClearPass\Resources\PlatformCertificates;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\PlatformCertificates\ClientCert;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Requests\PlatformCertificates\ClientCert\CreateClientCertRequest;
use spkm\ClearPass\Requests\PlatformCertificates\ClientCert\DeleteClientCertRequest;
use spkm\ClearPass\Requests\PlatformCertificates\ClientCert\GetClientCertRequest;
use spkm\ClearPass\Requests\PlatformCertificates\ClientCert\GetClientCertsRequest;

/**
 * Manage Client Certificates, from ClearPass::platformCertificates()->clientCerts().
 *
 * @extends Builder<ClientCert>
 */
class ClientCertResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, ClientCert::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetClientCertsRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateClientCertRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetClientCertRequest($id);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteClientCertRequest($id, $options);
    }
}
