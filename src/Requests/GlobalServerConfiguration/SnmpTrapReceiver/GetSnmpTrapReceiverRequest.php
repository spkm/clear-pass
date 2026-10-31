<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\SnmpTrapReceiver;

use spkm\ClearPass\Data\GlobalServerConfiguration\SnmpTrapReceiver;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Snmp Trap Receiver: GET /snmp-trap-receiver/{snmp_trap_receiver_id}.
 */
class GetSnmpTrapReceiverRequest extends ItemRequest
{
    protected ?string $dto = SnmpTrapReceiver::class;

    public function __construct(protected int $snmpTrapReceiverId) {}

    public function resolveEndpoint(): string
    {
        return '/snmp-trap-receiver/'.$this->snmpTrapReceiverId;
    }
}
