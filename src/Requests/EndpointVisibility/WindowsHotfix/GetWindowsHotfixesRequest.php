<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\WindowsHotfix;

use spkm\ClearPass\Data\EndpointVisibility\WindowsHotfix;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of Windows Hotfixes: GET /windows-hotfix.
 */
class GetWindowsHotfixesRequest extends ListRequest
{
    protected ?string $dto = WindowsHotfix::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/windows-hotfix';
    }
}
