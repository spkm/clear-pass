<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\FingerprintDictionary;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Fingerprint: DELETE /fingerprint/{fingerprint_id}.
 */
class DeleteFingerprintDictionaryRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $fingerprintId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/fingerprint/'.$this->fingerprintId;
    }
}
