<?php

namespace spkm\ClearPass\Requests\LocalServerConfiguration\ServerSnmp;

use spkm\ClearPass\Data\LocalServerConfiguration\ServerSnmp;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get server snmp settings: GET /server/snmp/{server_uuid}.
 */
class GetServerSnmpRequest extends ItemRequest
{
    protected ?string $dto = ServerSnmp::class;

    public function __construct(protected string $serverUuid) {}

    public function resolveEndpoint(): string
    {
        return '/server/snmp/'.rawurlencode((string) $this->serverUuid);
    }
}
