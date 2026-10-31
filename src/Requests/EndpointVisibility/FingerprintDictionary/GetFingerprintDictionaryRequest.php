<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\FingerprintDictionary;

use spkm\ClearPass\Data\EndpointVisibility\FingerprintDictionary;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Fingerprint: GET /fingerprint/{fingerprint_id}.
 */
class GetFingerprintDictionaryRequest extends ItemRequest
{
    protected ?string $dto = FingerprintDictionary::class;

    public function __construct(protected int $fingerprintId) {}

    public function resolveEndpoint(): string
    {
        return '/fingerprint/'.$this->fingerprintId;
    }
}
