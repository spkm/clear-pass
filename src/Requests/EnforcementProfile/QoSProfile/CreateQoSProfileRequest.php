<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\QoSProfile;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\QoSProfile;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Add a QoS Profile: POST /enforcement-profile-dur/qos-profile/{product_name}.
 */
class CreateQoSProfileRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = QoSProfile::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/qos-profile/'.rawurlencode((string) $this->productName);
    }
}
