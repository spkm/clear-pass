<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\EnforcementProfile;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\EnforcementProfile;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new Enforcement Profile: POST /enforcement-profile.
 */
class CreateEnforcementProfileRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = EnforcementProfile::class;

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
        return '/enforcement-profile';
    }
}
