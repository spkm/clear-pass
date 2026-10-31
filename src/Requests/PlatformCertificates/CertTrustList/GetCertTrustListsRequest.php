<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\CertTrustList;

use spkm\ClearPass\Data\PlatformCertificates\CertTrustList;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of certificate trust list: GET /cert-trust-list.
 */
class GetCertTrustListsRequest extends ListRequest
{
    protected ?string $dto = CertTrustList::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/cert-trust-list';
    }
}
