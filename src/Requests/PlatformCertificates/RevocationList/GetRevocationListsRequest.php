<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\RevocationList;

use spkm\ClearPass\Data\PlatformCertificates\RevocationList;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of revocation certificate list: GET /revocation-list.
 */
class GetRevocationListsRequest extends ListRequest
{
    protected ?string $dto = RevocationList::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/revocation-list';
    }
}
