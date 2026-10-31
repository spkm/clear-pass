<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\AdminUser;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\AdminUser;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of an admin user: PATCH /admin-user/{id}.
 */
class UpdateAdminUserRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = AdminUser::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/admin-user/'.$this->id;
    }
}
