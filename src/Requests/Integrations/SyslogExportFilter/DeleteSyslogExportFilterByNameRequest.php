<?php

namespace spkm\ClearPass\Requests\Integrations\SyslogExportFilter;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a syslog export filter by name: DELETE /syslog-export-filter/name/{name}.
 */
class DeleteSyslogExportFilterByNameRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/syslog-export-filter/name/'.rawurlencode((string) $this->name);
    }
}
