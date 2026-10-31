<?php

namespace spkm\ClearPass\Resources\PlatformCertificates;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\PlatformCertificates\ServiceCert;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Requests\PlatformCertificates\ServiceCert\CreateServiceCertRequest;
use spkm\ClearPass\Requests\PlatformCertificates\ServiceCert\DeleteServiceCertRequest;
use spkm\ClearPass\Requests\PlatformCertificates\ServiceCert\GetServiceCertRequest;
use spkm\ClearPass\Requests\PlatformCertificates\ServiceCert\GetServiceCertsRequest;

/**
 * Manage Service Certificates, from ClearPass::platformCertificates()->serviceCerts().
 *
 * @extends Builder<ServiceCert>
 */
class ServiceCertResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, ServiceCert::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetServiceCertsRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateServiceCertRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetServiceCertRequest($id);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteServiceCertRequest($id, $options);
    }
}
