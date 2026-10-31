<?php

namespace spkm\ClearPass\Requests\LocalServerConfiguration\ServerFips;

use spkm\ClearPass\Data\LocalServerConfiguration\ServerFipsResponse;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get server FIPS mode information: GET /server/fips.
 */
class GetServerFipsRequest extends ItemRequest
{
    protected ?string $dto = ServerFipsResponse::class;

    public function resolveEndpoint(): string
    {
        return '/server/fips';
    }
}
