<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\SnmpTrapReceiver;

use spkm\ClearPass\Data\GlobalServerConfiguration\SnmpTrapReceiver;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of Snmp Trap Receiver: GET /snmp-trap-receiver.
 */
class GetSnmpTrapReceiversRequest extends ListRequest
{
    protected ?string $dto = SnmpTrapReceiver::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/snmp-trap-receiver';
    }
}
