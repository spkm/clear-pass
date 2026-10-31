<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\SnmpTrapReceiver;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Snmp Trap Receiver: DELETE /snmp-trap-receiver/{snmp_trap_receiver_id}.
 */
class DeleteSnmpTrapReceiverRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $snmpTrapReceiverId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/snmp-trap-receiver/'.$this->snmpTrapReceiverId;
    }
}
