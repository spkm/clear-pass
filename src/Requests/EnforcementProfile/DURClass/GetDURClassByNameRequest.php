<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\DURClass;

use spkm\ClearPass\Data\EnforcementProfile\DURClass;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a DUR Class by name: GET /enforcement-profile-dur/dur-class/{product_name}/name/{name}.
 */
class GetDURClassByNameRequest extends ItemRequest
{
    protected ?string $dto = DURClass::class;

    public function __construct(protected string $productName, protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/dur-class/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
