<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\LocalUserPasswordPolicy;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\LocalUserPasswordPolicy;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Patch the local user password policy: PATCH /local-user/password-policy.
 */
class UpdateLocalUserPasswordPolicyRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = LocalUserPasswordPolicy::class;

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
        return '/local-user/password-policy';
    }
}
