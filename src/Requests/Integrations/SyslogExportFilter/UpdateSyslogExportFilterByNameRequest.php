<?php

namespace spkm\ClearPass\Requests\Integrations\SyslogExportFilter;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Integrations\SyslogExportFilter;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a syslog export filter by name: PATCH /syslog-export-filter/name/{name}.
 */
class UpdateSyslogExportFilterByNameRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = SyslogExportFilter::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/syslog-export-filter/name/'.rawurlencode((string) $this->name);
    }
}
