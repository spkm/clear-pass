<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\AdminUserPasswordPolicy;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\AdminUserPasswordPolicy;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Put the admin user password policies: PUT /admin-user/password-policy.
 */
class ReplaceAdminUserPasswordPolicyRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = AdminUserPasswordPolicy::class;

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
        return '/admin-user/password-policy';
    }
}
