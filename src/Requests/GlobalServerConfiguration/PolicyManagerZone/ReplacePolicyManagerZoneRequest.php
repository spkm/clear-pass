<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\PolicyManagerZone;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\PolicyManagerZone;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update Policy Manager Zone: PUT /server/policy-manager-zones/{zone_id}.
 */
class ReplacePolicyManagerZoneRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = PolicyManagerZone::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $zoneId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/server/policy-manager-zones/'.$this->zoneId;
    }
}
