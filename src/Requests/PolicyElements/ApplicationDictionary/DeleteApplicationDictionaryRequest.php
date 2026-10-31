<?php

namespace spkm\ClearPass\Requests\PolicyElements\ApplicationDictionary;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an Application Dictionary: DELETE /application-dictionary/{application_dictionary_id}.
 */
class DeleteApplicationDictionaryRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $applicationDictionaryId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/application-dictionary/'.$this->applicationDictionaryId;
    }
}
