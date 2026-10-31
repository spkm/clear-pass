<?php

namespace spkm\ClearPass\Resources\GlobalServerConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\GlobalServerConfiguration\SnmpTrapReceiver;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\SnmpTrapReceiver\CreateSnmpTrapReceiverRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\SnmpTrapReceiver\DeleteSnmpTrapReceiverByNameRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\SnmpTrapReceiver\DeleteSnmpTrapReceiverRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\SnmpTrapReceiver\GetSnmpTrapReceiverByNameRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\SnmpTrapReceiver\GetSnmpTrapReceiverRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\SnmpTrapReceiver\GetSnmpTrapReceiversRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\SnmpTrapReceiver\ReplaceSnmpTrapReceiverByNameRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\SnmpTrapReceiver\ReplaceSnmpTrapReceiverRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\SnmpTrapReceiver\UpdateSnmpTrapReceiverByNameRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\SnmpTrapReceiver\UpdateSnmpTrapReceiverRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage Snmp Trap Receiver, from ClearPass::globalServerConfiguration()->snmpTrapReceivers().
 *
 * @extends Builder<SnmpTrapReceiver>
 */
class SnmpTrapReceiverResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, SnmpTrapReceiver::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSnmpTrapReceiversRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateSnmpTrapReceiverRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetSnmpTrapReceiverRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateSnmpTrapReceiverRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceSnmpTrapReceiverRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteSnmpTrapReceiverRequest((int) $id, $options);
    }

    /**
     * Get a Snmp Trap Receiver by name: GET /snmp-trap-receiver/name/{name}.
     */
    public function findByName(string $name): ?SnmpTrapReceiver
    {
        return $this->fetchOrNull(new GetSnmpTrapReceiverByNameRequest($name));
    }

    /**
     * Update some fields of Snmp Trap Receiver by name: PATCH /snmp-trap-receiver/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?SnmpTrapReceiver
    {
        return $this->fetch(new UpdateSnmpTrapReceiverByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a Snmp Trap Receiver by name: PUT /snmp-trap-receiver/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?SnmpTrapReceiver
    {
        return $this->fetch(new ReplaceSnmpTrapReceiverByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a Snmp Trap Receiver by name: DELETE /snmp-trap-receiver/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteSnmpTrapReceiverByNameRequest($name, $options));

        return true;
    }
}
