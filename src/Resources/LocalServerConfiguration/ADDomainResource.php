<?php

namespace spkm\ClearPass\Resources\LocalServerConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\LocalServerConfiguration\ADDomain;
use spkm\ClearPass\Data\LocalServerConfiguration\ADDomainStatus;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Requests\LocalServerConfiguration\ADDomain\GetADDomainByNetbiosNameRequest;
use spkm\ClearPass\Requests\LocalServerConfiguration\ADDomain\GetADDomainsRequest;
use spkm\ClearPass\Requests\LocalServerConfiguration\ADDomain\JoinADDomainRequest;
use spkm\ClearPass\Requests\LocalServerConfiguration\ADDomain\LeaveADDomainRequest;
use spkm\ClearPass\Requests\LocalServerConfiguration\ADDomain\UpdateADDomainPasswordServersRequest;

/**
 * Manage AD Domains, from ClearPass::localServerConfiguration()->adDomains().
 *
 * @extends Builder<ADDomain>
 */
class ADDomainResource extends Builder
{
    public function __construct(ClearPassConnector $connector, protected string $serverUuid)
    {
        parent::__construct($connector, ADDomain::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetADDomainsRequest($this->serverUuid, $query);
    }

    /**
     * GET an AD domain by netbios_name: GET /ad-domain/{server_uuid}/netbios-name/{netbios_name}.
     */
    public function findByNetbiosName(string $netbiosName): ?ADDomain
    {
        return $this->fetchOrNull(new GetADDomainByNetbiosNameRequest($this->serverUuid, $netbiosName));
    }

    /**
     * Join AD Domain: PUT /ad-domain/join/{server_uuid}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function join(array|Data $attributes = [], array $options = []): ?ADDomainStatus
    {
        return $this->fetch(new JoinADDomainRequest($this->serverUuid, $this->payloadOf($attributes), $options));
    }

    /**
     * Leave AD domain: PUT /ad-domain/leave/{server_uuid}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function leave(array|Data $attributes = [], array $options = []): ?ADDomainStatus
    {
        return $this->fetch(new LeaveADDomainRequest($this->serverUuid, $this->payloadOf($attributes), $options));
    }

    /**
     * Configure AD Password Servers: PATCH /ad-domain/password-servers/{server_uuid}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updatePasswordServers(array|Data $attributes = [], array $options = []): ?ADDomain
    {
        return $this->fetch(new UpdateADDomainPasswordServersRequest($this->serverUuid, $this->payloadOf($attributes), $options));
    }
}
