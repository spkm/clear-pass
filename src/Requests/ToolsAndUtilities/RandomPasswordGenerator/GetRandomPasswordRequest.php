<?php

namespace spkm\ClearPass\Requests\ToolsAndUtilities\RandomPasswordGenerator;

use spkm\ClearPass\Data\ToolsAndUtilities\RandomPasswordGeneratorResponse;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * GET /random-password: GET /random-password.
 */
class GetRandomPasswordRequest extends ItemRequest
{
    protected ?string $dto = RandomPasswordGeneratorResponse::class;

    public function resolveEndpoint(): string
    {
        return '/random-password';
    }
}
