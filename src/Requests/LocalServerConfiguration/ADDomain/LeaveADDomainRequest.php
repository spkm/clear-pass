<?php

namespace spkm\ClearPass\Requests\LocalServerConfiguration\ADDomain;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\LocalServerConfiguration\ADDomainStatus;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Leave AD domain: PUT /ad-domain/leave/{server_uuid}.
 */
class LeaveADDomainRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = ADDomainStatus::class;

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
        return '/ad-domain/leave/'.rawurlencode((string) $this->serverUuid);
    }
}
