<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\ClientCert;

use spkm\ClearPass\Data\PlatformCertificates\ClientCert;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of client certificates: GET /client-cert.
 */
class GetClientCertsRequest extends ListRequest
{
    protected ?string $dto = ClientCert::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/client-cert';
    }
}
