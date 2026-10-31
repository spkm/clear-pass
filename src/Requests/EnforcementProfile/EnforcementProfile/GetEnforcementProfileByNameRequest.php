<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\EnforcementProfile;

use spkm\ClearPass\Data\EnforcementProfile\EnforcementProfile;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an Enforcement Profile by name: GET /enforcement-profile/name/{name}.
 */
class GetEnforcementProfileByNameRequest extends ItemRequest
{
    protected ?string $dto = EnforcementProfile::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile/name/'.rawurlencode((string) $this->name);
    }
}
