<?php

namespace spkm\ClearPass\Requests\CertificateAuthority\Certificate;

use spkm\ClearPass\Data\CertificateAuthority\Certificate;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of certificates: GET /certificate.
 */
class GetCertificatesRequest extends ListRequest
{
    protected ?string $dto = Certificate::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/certificate';
    }
}
