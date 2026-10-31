<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\AdminPrivilege;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\AdminPrivilege;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace an admin privilege: PUT /admin-privilege/{admin_privilege_id}.
 */
class ReplaceAdminPrivilegeRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = AdminPrivilege::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $adminPrivilegeId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/admin-privilege/'.$this->adminPrivilegeId;
    }
}
