<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\VoIPProfile;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\VoIPProfile;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Add a VoIP Profile: POST /enforcement-profile-dur/voip-profile/{product_name}.
 */
class CreateVoIPProfileRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = VoIPProfile::class;

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
        return '/enforcement-profile-dur/voip-profile/'.rawurlencode((string) $this->productName);
    }
}
