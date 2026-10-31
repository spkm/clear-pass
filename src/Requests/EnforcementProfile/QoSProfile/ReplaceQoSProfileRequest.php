<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\QoSProfile;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\QoSProfile;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a QoS Profile: PUT /enforcement-profile-dur/qos-profile/{product_name}/{qos_profile_id}.
 */
class ReplaceQoSProfileRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = QoSProfile::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected int $qosProfileId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/qos-profile/'.rawurlencode((string) $this->productName).'/'.$this->qosProfileId;
    }
}
