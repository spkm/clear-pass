<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\PolicerProfile;

use spkm\ClearPass\Data\EnforcementProfile\PolicerProfile;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Policer Profile by name: GET /enforcement-profile-dur/policer-profile/{product_name}/name/{name}.
 */
class GetPolicerProfileByNameRequest extends ItemRequest
{
    protected ?string $dto = PolicerProfile::class;

    public function __construct(protected string $productName, protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/policer-profile/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
