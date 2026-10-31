<?php

namespace spkm\ClearPass\Requests\PolicyElements\PosturePolicy;

use spkm\ClearPass\Data\PolicyElements\PosturePolicy;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Posture Policy: GET /posture-policy/{posture_policy_id}.
 */
class GetPosturePolicyRequest extends ItemRequest
{
    protected ?string $dto = PosturePolicy::class;

    public function __construct(protected int $posturePolicyId) {}

    public function resolveEndpoint(): string
    {
        return '/posture-policy/'.$this->posturePolicyId;
    }
}
