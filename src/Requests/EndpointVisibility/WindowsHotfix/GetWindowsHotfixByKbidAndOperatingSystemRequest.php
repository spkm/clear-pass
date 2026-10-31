<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\WindowsHotfix;

use spkm\ClearPass\Data\EndpointVisibility\WindowsHotfix;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a windows hotfix by kbid and os: GET /windows-hotfix/kbid/{kbid}/operating_system/{operating_system}.
 */
class GetWindowsHotfixByKbidAndOperatingSystemRequest extends ItemRequest
{
    protected ?string $dto = WindowsHotfix::class;

    public function __construct(protected string $kbid, protected string $operatingSystem) {}

    public function resolveEndpoint(): string
    {
        return '/windows-hotfix/kbid/'.rawurlencode((string) $this->kbid).'/operating_system/'.rawurlencode((string) $this->operatingSystem);
    }
}
