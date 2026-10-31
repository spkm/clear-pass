<?php

namespace spkm\ClearPass\Requests\LocalServerConfiguration\ADDomain;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\LocalServerConfiguration\ADDomain;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Configure AD Password Servers: PATCH /ad-domain/password-servers/{server_uuid}.
 */
class UpdateADDomainPasswordServersRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = ADDomain::class;

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
        return '/ad-domain/password-servers/'.rawurlencode((string) $this->serverUuid);
    }
}
