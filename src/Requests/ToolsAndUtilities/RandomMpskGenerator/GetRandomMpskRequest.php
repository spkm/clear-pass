<?php

namespace spkm\ClearPass\Requests\ToolsAndUtilities\RandomMpskGenerator;

use spkm\ClearPass\Data\ToolsAndUtilities\RandomMpskGeneratorResponse;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * GET /random-mpsk: GET /random-mpsk.
 */
class GetRandomMpskRequest extends ItemRequest
{
    protected ?string $dto = RandomMpskGeneratorResponse::class;

    public function resolveEndpoint(): string
    {
        return '/random-mpsk';
    }
}
