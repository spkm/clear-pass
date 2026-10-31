<?php

namespace spkm\ClearPass\Requests\LocalServerConfiguration\ADDomain;

use spkm\ClearPass\Data\LocalServerConfiguration\ADDomain;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * GET an AD domain by netbios_name: GET /ad-domain/{server_uuid}/netbios-name/{netbios_name}.
 */
class GetADDomainByNetbiosNameRequest extends ItemRequest
{
    protected ?string $dto = ADDomain::class;

    public function __construct(protected string $serverUuid, protected string $netbiosName) {}

    public function resolveEndpoint(): string
    {
        return '/ad-domain/'.rawurlencode((string) $this->serverUuid).'/netbios-name/'.rawurlencode((string) $this->netbiosName);
    }
}
