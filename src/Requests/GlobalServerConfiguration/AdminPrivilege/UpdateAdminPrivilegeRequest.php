<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\AdminPrivilege;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\AdminPrivilege;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of an admin privilege: PATCH /admin-privilege/{admin_privilege_id}.
 */
class UpdateAdminPrivilegeRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

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
