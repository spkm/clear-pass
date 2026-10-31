<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\OnGuardGlobalSettings;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\OnGuardGlobalSettings;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update OnGuard global settings: POST /onguard/global-settings.
 */
class CreateOnGuardGlobalSettingsRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = OnGuardGlobalSettings::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/onguard/global-settings';
    }
}
