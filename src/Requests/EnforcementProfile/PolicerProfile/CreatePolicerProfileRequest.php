<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\PolicerProfile;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\PolicerProfile;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Add a Policer Profile: POST /enforcement-profile-dur/policer-profile/{product_name}.
 */
class CreatePolicerProfileRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = PolicerProfile::class;

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
        return '/enforcement-profile-dur/policer-profile/'.rawurlencode((string) $this->productName);
    }
}
