<?php

namespace spkm\ClearPass\Requests\Integrations\SyslogExportFilter;

use spkm\ClearPass\Data\Integrations\SyslogExportFilter;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of syslog export filter: GET /syslog-export-filter.
 */
class GetSyslogExportFiltersRequest extends ListRequest
{
    protected ?string $dto = SyslogExportFilter::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/syslog-export-filter';
    }
}
