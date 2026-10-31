<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\ServerCert;

use spkm\ClearPass\Data\PlatformCertificates\ServerCert;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of server certificates: GET /server-cert.
 */
class GetServerCertsRequest extends ListRequest
{
    protected ?string $dto = ServerCert::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/server-cert';
    }
}
