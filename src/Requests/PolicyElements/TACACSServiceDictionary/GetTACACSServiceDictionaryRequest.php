<?php

namespace spkm\ClearPass\Requests\PolicyElements\TACACSServiceDictionary;

use spkm\ClearPass\Data\PolicyElements\TACACSServiceDictionary;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a TACACS+ Service Dictionary: GET /tacacs-service-dictionary/{tacacs_service_dictionary_id}.
 */
class GetTACACSServiceDictionaryRequest extends ItemRequest
{
    protected ?string $dto = TACACSServiceDictionary::class;

    public function __construct(protected int $tacacsServiceDictionaryId) {}

    public function resolveEndpoint(): string
    {
        return '/tacacs-service-dictionary/'.$this->tacacsServiceDictionaryId;
    }
}
