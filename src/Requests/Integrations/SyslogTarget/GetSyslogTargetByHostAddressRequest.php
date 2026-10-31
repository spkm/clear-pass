<?php

namespace spkm\ClearPass\Requests\Integrations\SyslogTarget;

use spkm\ClearPass\Data\Integrations\SyslogTarget;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a syslog target by host_address: GET /syslog-target/host-address/{host_address}.
 */
class GetSyslogTargetByHostAddressRequest extends ItemRequest
{
    protected ?string $dto = SyslogTarget::class;

    public function __construct(protected string $hostAddress) {}

    public function resolveEndpoint(): string
    {
        return '/syslog-target/host-address/'.rawurlencode((string) $this->hostAddress);
    }
}
