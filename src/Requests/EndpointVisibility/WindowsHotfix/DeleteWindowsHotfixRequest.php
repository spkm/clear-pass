<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\WindowsHotfix;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a windows hotfix: DELETE /windows-hotfix/{windows_hotfix_id}.
 */
class DeleteWindowsHotfixRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $windowsHotfixId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/windows-hotfix/'.$this->windowsHotfixId;
    }
}
