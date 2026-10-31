<?php

namespace spkm\ClearPass\Requests\Integrations\SyslogExportFilter;

use spkm\ClearPass\Data\Integrations\SyslogExportFilter;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a syslog export filter: GET /syslog-export-filter/{syslog_export_filter_id}.
 */
class GetSyslogExportFilterRequest extends ItemRequest
{
    protected ?string $dto = SyslogExportFilter::class;

    public function __construct(protected int $syslogExportFilterId) {}

    public function resolveEndpoint(): string
    {
        return '/syslog-export-filter/'.$this->syslogExportFilterId;
    }
}
