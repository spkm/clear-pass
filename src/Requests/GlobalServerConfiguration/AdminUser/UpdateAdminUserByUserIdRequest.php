<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\AdminUser;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\AdminUser;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of an admin user by user_id: PATCH /admin-user/user-id/{user_id}.
 */
class UpdateAdminUserByUserIdRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = AdminUser::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $userId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/admin-user/user-id/'.rawurlencode((string) $this->userId);
    }
}
