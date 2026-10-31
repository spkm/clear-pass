<?php

namespace spkm\ClearPass\Requests\Integrations\SyslogTarget;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a syslog target: DELETE /syslog-target/{syslog_target_id}.
 */
class DeleteSyslogTargetRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $syslogTargetId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/syslog-target/'.$this->syslogTargetId;
    }
}
