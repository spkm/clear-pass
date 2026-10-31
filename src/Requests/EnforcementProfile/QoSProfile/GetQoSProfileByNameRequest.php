<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\QoSProfile;

use spkm\ClearPass\Data\EnforcementProfile\QoSProfile;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a QoS Profile by name: GET /enforcement-profile-dur/qos-profile/{product_name}/name/{name}.
 */
class GetQoSProfileByNameRequest extends ItemRequest
{
    protected ?string $dto = QoSProfile::class;

    public function __construct(protected string $productName, protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/qos-profile/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
