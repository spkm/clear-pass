<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\AdminUser;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\AdminUser;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace an admin user: PUT /admin-user/{id}.
 */
class ReplaceAdminUserRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

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
