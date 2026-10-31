<?php

namespace spkm\ClearPass\Requests\Integrations\SyslogExportFilter;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Integrations\SyslogExportFilter;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new syslog export filter: POST /syslog-export-filter.
 */
class CreateSyslogExportFilterRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = SyslogExportFilter::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/syslog-export-filter';
    }
}
