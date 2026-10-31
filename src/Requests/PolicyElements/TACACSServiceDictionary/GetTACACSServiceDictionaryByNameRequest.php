<?php

namespace spkm\ClearPass\Requests\PolicyElements\TACACSServiceDictionary;

use spkm\ClearPass\Data\PolicyElements\TACACSServiceDictionary;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a TACACS+ Service Dictionary by name: GET /tacacs-service-dictionary/name/{name}.
 */
class GetTACACSServiceDictionaryByNameRequest extends ItemRequest
{
    protected ?string $dto = TACACSServiceDictionary::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/tacacs-service-dictionary/name/'.rawurlencode((string) $this->name);
    }
}
