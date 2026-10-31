<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\OnGuardActivity;

use spkm\ClearPass\Data\EndpointVisibility\OnGuardActivity;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Clearpass OnGuard Endpoint Details: GET /onguard-activity/{onguard_activity_id}.
 */
class GetOnGuardActivityRequest extends ItemRequest
{
    protected ?string $dto = OnGuardActivity::class;

    public function __construct(protected int $onguardActivityId) {}

    public function resolveEndpoint(): string
    {
        return '/onguard-activity/'.$this->onguardActivityId;
    }
}
