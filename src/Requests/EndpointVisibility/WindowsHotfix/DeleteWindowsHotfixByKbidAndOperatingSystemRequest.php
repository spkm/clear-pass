<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\WindowsHotfix;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a windows hotfix by kbid and os: DELETE /windows-hotfix/kbid/{kbid}/operating_system/{operating_system}.
 */
class DeleteWindowsHotfixByKbidAndOperatingSystemRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $kbid, protected string $operatingSystem, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/windows-hotfix/kbid/'.rawurlencode((string) $this->kbid).'/operating_system/'.rawurlencode((string) $this->operatingSystem);
    }
}
