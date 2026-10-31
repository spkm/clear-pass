<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSDictionary;

use spkm\ClearPass\Data\PolicyElements\RADIUSDictionary;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a RADIUS Dictionary: GET /radius-dictionary/{radius_dictionary_id}.
 */
class GetRADIUSDictionaryRequest extends ItemRequest
{
    protected ?string $dto = RADIUSDictionary::class;

    public function __construct(protected int $radiusDictionaryId) {}

    public function resolveEndpoint(): string
    {
        return '/radius-dictionary/'.$this->radiusDictionaryId;
    }
}
