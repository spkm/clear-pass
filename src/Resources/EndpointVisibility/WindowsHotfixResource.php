<?php

namespace spkm\ClearPass\Resources\EndpointVisibility;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\EndpointVisibility\WindowsHotfix;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EndpointVisibility\WindowsHotfix\CreateWindowsHotfixRequest;
use spkm\ClearPass\Requests\EndpointVisibility\WindowsHotfix\DeleteWindowsHotfixByKbidAndOperatingSystemRequest;
use spkm\ClearPass\Requests\EndpointVisibility\WindowsHotfix\DeleteWindowsHotfixRequest;
use spkm\ClearPass\Requests\EndpointVisibility\WindowsHotfix\GetWindowsHotfixByKbidAndOperatingSystemRequest;
use spkm\ClearPass\Requests\EndpointVisibility\WindowsHotfix\GetWindowsHotfixesRequest;
use spkm\ClearPass\Requests\EndpointVisibility\WindowsHotfix\GetWindowsHotfixRequest;
use spkm\ClearPass\Requests\EndpointVisibility\WindowsHotfix\ReplaceWindowsHotfixByKbidAndOperatingSystemRequest;
use spkm\ClearPass\Requests\EndpointVisibility\WindowsHotfix\ReplaceWindowsHotfixRequest;
use spkm\ClearPass\Requests\EndpointVisibility\WindowsHotfix\UpdateWindowsHotfixByKbidAndOperatingSystemRequest;
use spkm\ClearPass\Requests\EndpointVisibility\WindowsHotfix\UpdateWindowsHotfixRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage Windows Hotfix, from ClearPass::endpointVisibility()->windowsHotfixes().
 *
 * @extends Builder<WindowsHotfix>
 */
class WindowsHotfixResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, WindowsHotfix::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetWindowsHotfixesRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateWindowsHotfixRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetWindowsHotfixRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateWindowsHotfixRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceWindowsHotfixRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteWindowsHotfixRequest((int) $id, $options);
    }

    /**
     * Get a windows hotfix by kbid and os: GET /windows-hotfix/kbid/{kbid}/operating_system/{operating_system}.
     */
    public function findByKbidAndOperatingSystem(string $kbid, string $operatingSystem): ?WindowsHotfix
    {
        return $this->fetchOrNull(new GetWindowsHotfixByKbidAndOperatingSystemRequest($kbid, $operatingSystem));
    }

    /**
     * Update some fields of a windows hotfix by kbid and os: PATCH /windows-hotfix/kbid/{kbid}/operating_system/{operating_system}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByKbidAndOperatingSystem(string $kbid, string $operatingSystem, array|Data $attributes = [], array $options = []): ?WindowsHotfix
    {
        return $this->fetch(new UpdateWindowsHotfixByKbidAndOperatingSystemRequest($kbid, $operatingSystem, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a windows hotfix by kbid and os: PUT /windows-hotfix/kbid/{kbid}/operating_system/{operating_system}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByKbidAndOperatingSystem(string $kbid, string $operatingSystem, array|Data $attributes = [], array $options = []): ?WindowsHotfix
    {
        return $this->fetch(new ReplaceWindowsHotfixByKbidAndOperatingSystemRequest($kbid, $operatingSystem, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a windows hotfix by kbid and os: DELETE /windows-hotfix/kbid/{kbid}/operating_system/{operating_system}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByKbidAndOperatingSystem(string $kbid, string $operatingSystem, array $options = []): bool
    {
        $this->fetch(new DeleteWindowsHotfixByKbidAndOperatingSystemRequest($kbid, $operatingSystem, $options));

        return true;
    }
}
