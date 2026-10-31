<?php

namespace spkm\ClearPass\Requests\PolicyElements\EnforcementPolicy;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\EnforcementPolicy;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a enforcement policy by name: PUT /enforcement-policy/name/{name}.
 */
class ReplaceEnforcementPolicyByNameRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = EnforcementPolicy::class;

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
        return '/enforcement-policy/name/'.rawurlencode((string) $this->name);
    }
}
