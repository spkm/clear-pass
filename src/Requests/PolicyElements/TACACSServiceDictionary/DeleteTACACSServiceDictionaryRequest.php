<?php

namespace spkm\ClearPass\Requests\PolicyElements\TACACSServiceDictionary;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a TACACS+ Service Dictionary: DELETE /tacacs-service-dictionary/{tacacs_service_dictionary_id}.
 */
class DeleteTACACSServiceDictionaryRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $tacacsServiceDictionaryId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/tacacs-service-dictionary/'.$this->tacacsServiceDictionaryId;
    }
}
