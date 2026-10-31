<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSDictionary;

use spkm\ClearPass\Data\PolicyElements\RADIUSDictionary;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a RADIUS Dictionary by name: GET /radius-dictionary/name/{name}.
 */
class GetRADIUSDictionaryByNameRequest extends ItemRequest
{
    protected ?string $dto = RADIUSDictionary::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/radius-dictionary/name/'.rawurlencode((string) $this->name);
    }
}
