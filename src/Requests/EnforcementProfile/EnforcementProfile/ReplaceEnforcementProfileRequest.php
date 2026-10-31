<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\EnforcementProfile;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\EnforcementProfile;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace an Enforcement Profile: PUT /enforcement-profile/{enforcement_profile_id}.
 */
class ReplaceEnforcementProfileRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = EnforcementProfile::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $enforcementProfileId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile/'.$this->enforcementProfileId;
    }
}
