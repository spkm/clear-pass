<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\SnmpTrapReceiver;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Snmp Trap Receiver by name: DELETE /snmp-trap-receiver/name/{name}.
 */
class DeleteSnmpTrapReceiverByNameRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/snmp-trap-receiver/name/'.rawurlencode((string) $this->name);
    }
}
