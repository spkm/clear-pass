<?php

namespace spkm\ClearPass\Resources\PlatformCertificates;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\PlatformCertificates\CertTrustListDetails;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Requests\PlatformCertificates\CertTrustListDetails\GetCertTrustListDetailRequest;
use spkm\ClearPass\Requests\PlatformCertificates\CertTrustListDetails\GetCertTrustListDetailsRequest;

/**
 * Manage Certificate Trust List details, from ClearPass::platformCertificates()->certTrustListDetails().
 *
 * @extends Builder<CertTrustListDetails>
 */
class CertTrustListDetailsResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, CertTrustListDetails::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetCertTrustListDetailsRequest($query);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetCertTrustListDetailRequest($id);
    }
}
