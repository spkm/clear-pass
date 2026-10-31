<?php

namespace spkm\ClearPass\Requests\PolicyElements\PosturePolicy;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\PosturePolicy;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new Posture Policy: POST /posture-policy.
 */
class CreatePosturePolicyRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = PosturePolicy::class;

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
        return '/posture-policy';
    }
}
