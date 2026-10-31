<?php

namespace spkm\ClearPass\Requests\Integrations\SyslogExportFilter;

use spkm\ClearPass\Data\Integrations\SyslogExportFilter;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a syslog export filter by name: GET /syslog-export-filter/name/{name}.
 */
class GetSyslogExportFilterByNameRequest extends ItemRequest
{
    protected ?string $dto = SyslogExportFilter::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/syslog-export-filter/name/'.rawurlencode((string) $this->name);
    }
}
