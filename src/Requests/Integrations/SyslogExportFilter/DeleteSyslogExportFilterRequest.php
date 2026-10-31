<?php

namespace spkm\ClearPass\Requests\Integrations\SyslogExportFilter;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a syslog export filter: DELETE /syslog-export-filter/{syslog_export_filter_id}.
 */
class DeleteSyslogExportFilterRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $syslogExportFilterId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/syslog-export-filter/'.$this->syslogExportFilterId;
    }
}
