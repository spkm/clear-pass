<?php

namespace spkm\ClearPass\Resources\PlatformCertificates;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\PlatformCertificates\RevocationList;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Requests\PlatformCertificates\RevocationList\CreateRevocationListRequest;
use spkm\ClearPass\Requests\PlatformCertificates\RevocationList\DeleteRevocationListRequest;
use spkm\ClearPass\Requests\PlatformCertificates\RevocationList\GetRevocationListRequest;
use spkm\ClearPass\Requests\PlatformCertificates\RevocationList\GetRevocationListsRequest;
use spkm\ClearPass\Requests\PlatformCertificates\RevocationList\UpdateRevocationListRequest;

/**
 * Manage Revocation Certificate List, from ClearPass::platformCertificates()->revocationLists().
 *
 * @extends Builder<RevocationList>
 */
class RevocationListResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, RevocationList::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetRevocationListsRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateRevocationListRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetRevocationListRequest($id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateRevocationListRequest($id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteRevocationListRequest($id, $options);
    }
}
