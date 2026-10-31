<?php

namespace spkm\ClearPass\Requests\PolicyElements\PosturePolicy;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\PosturePolicy;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a Posture Policy by name: PUT /posture-policy/name/{name}.
 */
class ReplacePosturePolicyByNameRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = PosturePolicy::class;

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
        return '/posture-policy/name/'.rawurlencode((string) $this->name);
    }
}
