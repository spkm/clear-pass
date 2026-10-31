<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\QoSProfile;

use spkm\ClearPass\Data\EnforcementProfile\QoSProfile;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a QoS Profile: GET /enforcement-profile-dur/qos-profile/{product_name}/{qos_profile_id}.
 */
class GetQoSProfileRequest extends ItemRequest
{
    protected ?string $dto = QoSProfile::class;

    public function __construct(protected string $productName, protected int $qosProfileId) {}

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/qos-profile/'.rawurlencode((string) $this->productName).'/'.$this->qosProfileId;
    }
}
