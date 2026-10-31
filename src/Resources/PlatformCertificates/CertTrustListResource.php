<?php

namespace spkm\ClearPass\Resources\PlatformCertificates;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\PlatformCertificates\CertTrustList;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Requests\PlatformCertificates\CertTrustList\CreateCertTrustListRequest;
use spkm\ClearPass\Requests\PlatformCertificates\CertTrustList\DeleteCertTrustListRequest;
use spkm\ClearPass\Requests\PlatformCertificates\CertTrustList\GetCertTrustListRequest;
use spkm\ClearPass\Requests\PlatformCertificates\CertTrustList\GetCertTrustListsRequest;
use spkm\ClearPass\Requests\PlatformCertificates\CertTrustList\UpdateCertTrustListRequest;

/**
 * Manage Certificate Trust List, from ClearPass::platformCertificates()->certTrustLists().
 *
 * @extends Builder<CertTrustList>
 */
class CertTrustListResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, CertTrustList::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetCertTrustListsRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateCertTrustListRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetCertTrustListRequest($id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateCertTrustListRequest($id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteCertTrustListRequest($id, $options);
    }
}
