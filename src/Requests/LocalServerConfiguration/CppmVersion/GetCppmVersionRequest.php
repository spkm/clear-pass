<?php

namespace spkm\ClearPass\Requests\LocalServerConfiguration\CppmVersion;

use spkm\ClearPass\Data\LocalServerConfiguration\CppmVersion;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get Cppm version: GET /cppm-version.
 */
class GetCppmVersionRequest extends ItemRequest
{
    protected ?string $dto = CppmVersion::class;

    public function resolveEndpoint(): string
    {
        return '/cppm-version';
    }
}
