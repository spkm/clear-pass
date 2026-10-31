<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\FingerprintDictionary;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Fingerprint by name: DELETE /fingerprint/name/{category}/{family}/{name}.
 */
class DeleteFingerprintDictionaryByNameRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $category, protected string $family, protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/fingerprint/name/'.rawurlencode((string) $this->category).'/'.rawurlencode((string) $this->family).'/'.rawurlencode((string) $this->name);
    }
}
