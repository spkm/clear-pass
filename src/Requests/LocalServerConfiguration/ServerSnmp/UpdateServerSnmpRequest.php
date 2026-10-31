<?php

namespace spkm\ClearPass\Requests\LocalServerConfiguration\ServerSnmp;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\LocalServerConfiguration\ServerSnmp;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of server snmp settings: PATCH /server/snmp/{server_uuid}.
 */
class UpdateServerSnmpRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = ServerSnmp::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serverUuid, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/server/snmp/'.rawurlencode((string) $this->serverUuid);
    }
}
