<?php

namespace spkm\ClearPass\Requests\PolicyElements\PosturePolicy;

use spkm\ClearPass\Data\PolicyElements\PosturePolicy;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Posture Policy by name: GET /posture-policy/name/{name}.
 */
class GetPosturePolicyByNameRequest extends ItemRequest
{
    protected ?string $dto = PosturePolicy::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/posture-policy/name/'.rawurlencode((string) $this->name);
    }
}
