<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\ServiceCert;

use spkm\ClearPass\Data\PlatformCertificates\ServiceCert;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of service certificates: GET /service-cert.
 */
class GetServiceCertsRequest extends ListRequest
{
    protected ?string $dto = ServiceCert::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/service-cert';
    }
}
