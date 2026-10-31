<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\PolicyManagerZone;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\PolicyManagerZone;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update Policy Manager Zone by name: PUT /server/policy-manager-zones/name/{name}.
 */
class ReplacePolicyManagerZoneByNameRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = PolicyManagerZone::class;

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
        return '/server/policy-manager-zones/name/'.rawurlencode((string) $this->name);
    }
}
