<?php

namespace spkm\ClearPass\Requests\PolicyElements\EnforcementPolicy;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\EnforcementPolicy;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new enforcement policy: POST /enforcement-policy.
 */
class CreateEnforcementPolicyRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = EnforcementPolicy::class;

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
        return '/enforcement-policy';
    }
}
