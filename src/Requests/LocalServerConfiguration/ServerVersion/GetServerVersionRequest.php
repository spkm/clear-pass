<?php

namespace spkm\ClearPass\Requests\LocalServerConfiguration\ServerVersion;

use spkm\ClearPass\Data\LocalServerConfiguration\ServerVersionResponse;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get server version information: GET /server/version.
 */
class GetServerVersionRequest extends ItemRequest
{
    protected ?string $dto = ServerVersionResponse::class;

    public function resolveEndpoint(): string
    {
        return '/server/version';
    }
}
