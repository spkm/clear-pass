<?php

namespace spkm\ClearPass\Requests\Integrations\SyslogTarget;

use spkm\ClearPass\Data\Integrations\SyslogTarget;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a syslog target: GET /syslog-target/{syslog_target_id}.
 */
class GetSyslogTargetRequest extends ItemRequest
{
    protected ?string $dto = SyslogTarget::class;

    public function __construct(protected int $syslogTargetId) {}

    public function resolveEndpoint(): string
    {
        return '/syslog-target/'.$this->syslogTargetId;
    }
}
