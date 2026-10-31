<?php

namespace spkm\ClearPass\Requests\Integrations\SyslogTarget;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Integrations\SyslogTarget;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a syslog target by host_address: PATCH /syslog-target/host-address/{host_address}.
 */
class UpdateSyslogTargetByHostAddressRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = SyslogTarget::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $hostAddress, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/syslog-target/host-address/'.rawurlencode((string) $this->hostAddress);
    }
}
