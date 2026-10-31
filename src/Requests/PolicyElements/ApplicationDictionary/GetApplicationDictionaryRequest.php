<?php

namespace spkm\ClearPass\Requests\PolicyElements\ApplicationDictionary;

use spkm\ClearPass\Data\PolicyElements\ApplicationDictionary;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an Application Dictionary: GET /application-dictionary/{application_dictionary_id}.
 */
class GetApplicationDictionaryRequest extends ItemRequest
{
    protected ?string $dto = ApplicationDictionary::class;

    public function __construct(protected int $applicationDictionaryId) {}

    public function resolveEndpoint(): string
    {
        return '/application-dictionary/'.$this->applicationDictionaryId;
    }
}
