<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\DURClass;

use spkm\ClearPass\Data\EnforcementProfile\DURClass;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a DUR Class: GET /enforcement-profile-dur/dur-class/{product_name}/{dur_class_id}.
 */
class GetDURClassRequest extends ItemRequest
{
    protected ?string $dto = DURClass::class;

    public function __construct(protected string $productName, protected int $durClassId) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/dur-class/'.rawurlencode((string) $this->productName).'/'.$this->durClassId;
    }
}
