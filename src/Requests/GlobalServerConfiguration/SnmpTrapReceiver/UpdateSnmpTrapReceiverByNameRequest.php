<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\SnmpTrapReceiver;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\SnmpTrapReceiver;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of Snmp Trap Receiver by name: PATCH /snmp-trap-receiver/name/{name}.
 */
class UpdateSnmpTrapReceiverByNameRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

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
