<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\EnforcementProfile;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\EnforcementProfile;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update an Enforcement Profile by name: PATCH /enforcement-profile/name/{name}.
 */
class UpdateEnforcementProfileByNameRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = EnforcementProfile::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile/name/'.rawurlencode((string) $this->name);
    }
}
