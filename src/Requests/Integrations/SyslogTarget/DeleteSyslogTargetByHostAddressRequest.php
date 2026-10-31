<?php

namespace spkm\ClearPass\Requests\Integrations\SyslogTarget;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a syslog target by host_address: DELETE /syslog-target/host-address/{host_address}.
 */
class DeleteSyslogTargetByHostAddressRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $hostAddress, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/syslog-target/host-address/'.rawurlencode((string) $this->hostAddress);
    }
}
