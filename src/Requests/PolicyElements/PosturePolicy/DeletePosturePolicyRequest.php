<?php

namespace spkm\ClearPass\Requests\PolicyElements\PosturePolicy;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Posture Policy: DELETE /posture-policy/{posture_policy_id}.
 */
class DeletePosturePolicyRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $posturePolicyId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/posture-policy/'.$this->posturePolicyId;
    }
}
