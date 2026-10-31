<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\WindowsHotfix;

use spkm\ClearPass\Data\EndpointVisibility\WindowsHotfix;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a windows hotfix: GET /windows-hotfix/{windows_hotfix_id}.
 */
class GetWindowsHotfixRequest extends ItemRequest
{
    protected ?string $dto = WindowsHotfix::class;

    public function __construct(protected int $windowsHotfixId) {}

    public function resolveEndpoint(): string
    {
        return '/windows-hotfix/'.$this->windowsHotfixId;
    }
}
