<?php

namespace spkm\ClearPass\Requests\PolicyElements\ApplicationDictionary;

use spkm\ClearPass\Data\PolicyElements\ApplicationDictionary;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an Application Dictionary by name: GET /application-dictionary/name/{name}.
 */
class GetApplicationDictionaryByNameRequest extends ItemRequest
{
    protected ?string $dto = ApplicationDictionary::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/application-dictionary/name/'.rawurlencode((string) $this->name);
    }
}
