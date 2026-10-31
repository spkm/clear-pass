<?php

namespace spkm\ClearPass\Requests\PolicyElements\Role;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\Role;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a role: PUT /role/{role_id}.
 */
class ReplaceRoleRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = Role::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $roleId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/role/'.$this->roleId;
    }
}
