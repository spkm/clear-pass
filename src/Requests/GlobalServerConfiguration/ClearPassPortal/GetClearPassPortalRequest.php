<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\ClearPassPortal;

use spkm\ClearPass\Data\GlobalServerConfiguration\ClearPassPortal;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get ClearPass Portal: GET /clearpass-portal.
 */
class GetClearPassPortalRequest extends ItemRequest
{
    protected ?string $dto = ClearPassPortal::class;

    public function resolveEndpoint(): string
    {
        return '/clearpass-portal';
    }
}
