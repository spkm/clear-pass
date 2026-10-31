<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\AdminPrivilege;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\AdminPrivilege;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new admin privilege: POST /admin-privilege.
 */
class CreateAdminPrivilegeRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = AdminPrivilege::class;

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
        return '/admin-privilege';
    }
}
