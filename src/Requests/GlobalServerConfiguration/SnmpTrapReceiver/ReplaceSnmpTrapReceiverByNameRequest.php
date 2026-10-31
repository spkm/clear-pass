<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\SnmpTrapReceiver;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\SnmpTrapReceiver;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a Snmp Trap Receiver by name: PUT /snmp-trap-receiver/name/{name}.
 */
class ReplaceSnmpTrapReceiverByNameRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = SnmpTrapReceiver::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/snmp-trap-receiver/name/'.rawurlencode((string) $this->name);
    }
}
