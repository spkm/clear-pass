<?php

namespace spkm\ClearPass\Resources\CertificateAuthority;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\CertificateAuthority\Certificate;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\CertificateAuthority\Certificate\DeleteCertificateRequest;
use spkm\ClearPass\Requests\CertificateAuthority\Certificate\GetCertificateRequest;
use spkm\ClearPass\Requests\CertificateAuthority\Certificate\GetCertificatesRequest;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage Onboard certificates, from ClearPass::certificateAuthority()->certificates().
 *
 * @extends Builder<Certificate>
 */
class CertificateResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, Certificate::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetCertificatesRequest($query);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetCertificateRequest($id);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteCertificateRequest($id, $options);
    }
}
