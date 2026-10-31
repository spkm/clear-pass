<?php

namespace spkm\ClearPass\Requests\Integrations\SyslogExportFilter;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Integrations\SyslogExportFilter;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a syslog export filter: PUT /syslog-export-filter/{syslog_export_filter_id}.
 */
class ReplaceSyslogExportFilterRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = SyslogExportFilter::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $syslogExportFilterId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/syslog-export-filter/'.$this->syslogExportFilterId;
    }
}
