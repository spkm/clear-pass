<?php

namespace spkm\ClearPass\Requests\ApiOperations\TokenInfo;

use spkm\ClearPass\Data\ApiOperations\TokenInfo;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Returns OAuth2 authenticated client or user information: GET /oauth/me.
 */
class GetTokenInfoRequest extends ItemRequest
{
    protected ?string $dto = TokenInfo::class;

    public function resolveEndpoint(): string
    {
        return '/oauth/me';
    }
}
