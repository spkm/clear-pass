<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\VoIPProfile;

use spkm\ClearPass\Data\EnforcementProfile\VoIPProfile;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a VoIP Profile by name: GET /enforcement-profile-dur/voip-profile/{product_name}/name/{name}.
 */
class GetVoIPProfileByNameRequest extends ItemRequest
{
    protected ?string $dto = VoIPProfile::class;

    public function __construct(protected string $productName, protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/voip-profile/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
