<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\SnmpTrapReceiver;

use spkm\ClearPass\Data\GlobalServerConfiguration\SnmpTrapReceiver;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Snmp Trap Receiver by name: GET /snmp-trap-receiver/name/{name}.
 */
class GetSnmpTrapReceiverByNameRequest extends ItemRequest
{
    protected ?string $dto = SnmpTrapReceiver::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/snmp-trap-receiver/name/'.rawurlencode((string) $this->name);
    }
}
