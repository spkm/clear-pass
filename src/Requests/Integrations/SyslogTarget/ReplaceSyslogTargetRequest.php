<?php

namespace spkm\ClearPass\Requests\Integrations\SyslogTarget;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Integrations\SyslogTarget;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a syslog target: PUT /syslog-target/{syslog_target_id}.
 */
class ReplaceSyslogTargetRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = SyslogTarget::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $syslogTargetId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/syslog-target/'.$this->syslogTargetId;
    }
}
