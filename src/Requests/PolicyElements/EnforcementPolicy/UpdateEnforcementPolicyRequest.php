<?php

namespace spkm\ClearPass\Requests\PolicyElements\EnforcementPolicy;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\EnforcementPolicy;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update a enforcement policy: PATCH /enforcement-policy/{enforcement_policy_id}.
 */
class UpdateEnforcementPolicyRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = EnforcementPolicy::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $enforcementPolicyId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-policy/'.$this->enforcementPolicyId;
    }
}
