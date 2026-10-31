<?php

namespace spkm\ClearPass\Requests\Identities\LocalUser;

use spkm\ClearPass\Data\Identities\LocalUser;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a local user by user_id: GET /local-user/user-id/{user_id}.
 */
class GetLocalUserByUserIdRequest extends ItemRequest
{
    protected ?string $dto = LocalUser::class;

    public function __construct(protected string $userId) {}

    public function resolveEndpoint(): string
    {
        return '/local-user/user-id/'.rawurlencode((string) $this->userId);
    }
}
