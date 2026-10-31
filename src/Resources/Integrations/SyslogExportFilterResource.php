<?php

namespace spkm\ClearPass\Resources\Integrations;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\Integrations\SyslogExportFilter;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\Integrations\SyslogExportFilter\CreateSyslogExportFilterRequest;
use spkm\ClearPass\Requests\Integrations\SyslogExportFilter\DeleteSyslogExportFilterByNameRequest;
use spkm\ClearPass\Requests\Integrations\SyslogExportFilter\DeleteSyslogExportFilterRequest;
use spkm\ClearPass\Requests\Integrations\SyslogExportFilter\GetSyslogExportFilterByNameRequest;
use spkm\ClearPass\Requests\Integrations\SyslogExportFilter\GetSyslogExportFilterRequest;
use spkm\ClearPass\Requests\Integrations\SyslogExportFilter\GetSyslogExportFiltersRequest;
use spkm\ClearPass\Requests\Integrations\SyslogExportFilter\ReplaceSyslogExportFilterByNameRequest;
use spkm\ClearPass\Requests\Integrations\SyslogExportFilter\ReplaceSyslogExportFilterRequest;
use spkm\ClearPass\Requests\Integrations\SyslogExportFilter\UpdateSyslogExportFilterByNameRequest;
use spkm\ClearPass\Requests\Integrations\SyslogExportFilter\UpdateSyslogExportFilterRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage syslog export filter, from ClearPass::integrations()->syslogExportFilters().
 *
 * @extends Builder<SyslogExportFilter>
 */
class SyslogExportFilterResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, SyslogExportFilter::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSyslogExportFiltersRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateSyslogExportFilterRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetSyslogExportFilterRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateSyslogExportFilterRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceSyslogExportFilterRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteSyslogExportFilterRequest((int) $id, $options);
    }

    /**
     * Get a syslog export filter by name: GET /syslog-export-filter/name/{name}.
     */
    public function findByName(string $name): ?SyslogExportFilter
    {
        return $this->fetchOrNull(new GetSyslogExportFilterByNameRequest($name));
    }

    /**
     * Update some fields of a syslog export filter by name: PATCH /syslog-export-filter/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?SyslogExportFilter
    {
        return $this->fetch(new UpdateSyslogExportFilterByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a syslog export filter by name: PUT /syslog-export-filter/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?SyslogExportFilter
    {
        return $this->fetch(new ReplaceSyslogExportFilterByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a syslog export filter by name: DELETE /syslog-export-filter/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteSyslogExportFilterByNameRequest($name, $options));

        return true;
    }
}
