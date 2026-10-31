<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\SnmpTrapReceiver;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\SnmpTrapReceiver;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of Snmp Trap Receiver: PATCH /snmp-trap-receiver/{snmp_trap_receiver_id}.
 */
class UpdateSnmpTrapReceiverRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = SnmpTrapReceiver::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $snmpTrapReceiverId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/snmp-trap-receiver/'.$this->snmpTrapReceiverId;
    }
}
