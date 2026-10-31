<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\OnGuardZoneMapping;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\OnGuardZoneMapping;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Post Policy Manager Zones with associated authentication server IP addresses: POST /onguard/policy-manager-zones.
 */
class CreateOnGuardZoneMappingRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = OnGuardZoneMapping::class;

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
        return '/onguard/policy-manager-zones';
    }
}
