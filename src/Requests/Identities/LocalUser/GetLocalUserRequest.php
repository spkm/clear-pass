<?php

namespace spkm\ClearPass\Requests\Identities\LocalUser;

use spkm\ClearPass\Data\Identities\LocalUser;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a local user: GET /local-user/{local_user_id}.
 */
class GetLocalUserRequest extends ItemRequest
{
    protected ?string $dto = LocalUser::class;

    public function __construct(protected int $localUserId) {}

    public function resolveEndpoint(): string
    {
        return '/local-user/'.$this->localUserId;
    }
}
