<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\FingerprintDictionary;

use spkm\ClearPass\Data\EndpointVisibility\FingerprintDictionary;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Fingerprint by name: GET /fingerprint/name/{category}/{family}/{name}.
 */
class GetFingerprintDictionaryByNameRequest extends ItemRequest
{
    protected ?string $dto = FingerprintDictionary::class;

    public function __construct(protected string $category, protected string $family, protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/fingerprint/name/'.rawurlencode((string) $this->category).'/'.rawurlencode((string) $this->family).'/'.rawurlencode((string) $this->name);
    }
}
