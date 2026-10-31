<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\CertTrustListDetails;

use spkm\ClearPass\Data\PlatformCertificates\CertTrustListDetails;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of certificate trust list details: GET /cert-trust-list-details.
 */
class GetCertTrustListDetailsRequest extends ListRequest
{
    protected ?string $dto = CertTrustListDetails::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/cert-trust-list-details';
    }
}
