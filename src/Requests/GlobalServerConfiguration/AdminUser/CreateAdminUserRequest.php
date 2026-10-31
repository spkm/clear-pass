<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\AdminUser;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\AdminUser;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new admin user: POST /admin-user.
 */
class CreateAdminUserRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = AdminUser::class;

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
        return '/admin-user';
    }
}
