<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\QoSProfile;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a QoS Profile: DELETE /enforcement-profile-dur/qos-profile/{product_name}/{qos_profile_id}.
 */
class DeleteQoSProfileRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected int $qosProfileId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/qos-profile/'.rawurlencode((string) $this->productName).'/'.$this->qosProfileId;
    }
}
