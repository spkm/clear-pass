<?php

namespace spkm\ClearPass\Requests\Integrations\SyslogExportFilter;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Integrations\SyslogExportFilter;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a syslog export filter by name: PUT /syslog-export-filter/name/{name}.
 */
class ReplaceSyslogExportFilterByNameRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

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
