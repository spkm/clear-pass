<?php

namespace spkm\ClearPass\Requests\ApiOperations\TokenPrivileges;

use spkm\ClearPass\Data\ApiOperations\TokenPrivileges;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Returns a list of privileges available to the user: GET /oauth/privileges.
 */
class GetTokenPrivilegesRequest extends ItemRequest
{
    protected ?string $dto = TokenPrivileges::class;

    public function resolveEndpoint(): string
    {
        return '/oauth/privileges';
    }
}
