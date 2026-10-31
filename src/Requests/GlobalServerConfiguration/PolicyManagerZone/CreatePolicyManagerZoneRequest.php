<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\PolicyManagerZone;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\PolicyManagerZone;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create Policy Manager Zone: POST /server/policy-manager-zones.
 */
class CreatePolicyManagerZoneRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = PolicyManagerZone::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/server/policy-manager-zones';
    }
}
