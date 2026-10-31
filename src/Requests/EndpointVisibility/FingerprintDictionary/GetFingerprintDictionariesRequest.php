<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\FingerprintDictionary;

use spkm\ClearPass\Data\EndpointVisibility\FingerprintDictionary;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of Fingerprints: GET /fingerprint.
 */
class GetFingerprintDictionariesRequest extends ListRequest
{
    protected ?string $dto = FingerprintDictionary::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/fingerprint';
    }
}
