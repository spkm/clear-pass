<?php

namespace spkm\ClearPass\Resources\PlatformCertificates;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\PlatformCertificates\ServerCert;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Requests\PlatformCertificates\ServerCert\DisableServerCertByNameRequest;
use spkm\ClearPass\Requests\PlatformCertificates\ServerCert\EnableServerCertByNameRequest;
use spkm\ClearPass\Requests\PlatformCertificates\ServerCert\GetServerCertByNameRequest;
use spkm\ClearPass\Requests\PlatformCertificates\ServerCert\GetServerCertRequest;
use spkm\ClearPass\Requests\PlatformCertificates\ServerCert\GetServerCertsRequest;
use spkm\ClearPass\Requests\PlatformCertificates\ServerCert\ReplaceServerCertByNameRequest;
use spkm\ClearPass\Requests\PlatformCertificates\ServerCert\UpdateServerCertRequest;

/**
 * Manage Server Certificates, from ClearPass::platformCertificates()->serverCerts().
 *
 * @extends Builder<ServerCert>
 */
class ServerCertResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, ServerCert::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetServerCertsRequest($query);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetServerCertRequest($id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateServerCertRequest($id, $body, $options);
    }

    /**
     * Get a server certificate: GET /server-cert/name/{server_uuid}/{service_name}.
     */
    public function findByName(string $serverUuid, string $serviceName): ?ServerCert
    {
        return $this->fetchOrNull(new GetServerCertByNameRequest($serverUuid, $serviceName));
    }

    /**
     * Add a server certificate: PUT /server-cert/name/{server_uuid}/{service_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $serverUuid, string $serviceName, array|Data $attributes = [], array $options = []): ?ServerCert
    {
        return $this->fetch(new ReplaceServerCertByNameRequest($serverUuid, $serviceName, $this->payloadOf($attributes), $options));
    }

    /**
     * Update a server certificate: PATCH /server-cert/name/{server_uuid}/{service_name}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enableByName(string $serverUuid, string $serviceName, array $options = []): ?ServerCert
    {
        return $this->fetch(new EnableServerCertByNameRequest($serverUuid, $serviceName, $options));
    }

    /**
     * Update a server certificate: PATCH /server-cert/name/{server_uuid}/{service_name}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disableByName(string $serverUuid, string $serviceName, array $options = []): ?ServerCert
    {
        return $this->fetch(new DisableServerCertByNameRequest($serverUuid, $serviceName, $options));
    }
}
