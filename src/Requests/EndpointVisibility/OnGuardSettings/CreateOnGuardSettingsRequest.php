<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\OnGuardSettings;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\OnGuardSettings;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update OnGuard settings: POST /onguard/settings.
 */
class CreateOnGuardSettingsRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = OnGuardSettings::class;

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
        return '/onguard/settings';
    }
}
