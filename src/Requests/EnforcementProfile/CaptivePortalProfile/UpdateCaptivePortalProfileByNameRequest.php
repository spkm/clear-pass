<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\CaptivePortalProfile;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\CaptivePortalProfile;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a Captive Portal Profile by name: PATCH /enforcement-profile-dur/captive-portal-profile/{product_name}/name/{name}.
 */
class UpdateCaptivePortalProfileByNameRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = CaptivePortalProfile::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected string $name, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/captive-portal-profile/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
