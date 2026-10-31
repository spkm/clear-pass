<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\OnGuardActivity;

use spkm\ClearPass\Data\EndpointVisibility\OnGuardActivity;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a Clearpass OnGuard Endpoint Details by host_mac: GET /onguard-activity/host_mac/{host_mac}.
 */
class GetOnGuardActivityByHostMacRequest extends ItemRequest
{
    protected ?string $dto = OnGuardActivity::class;

    public function __construct(protected string $hostMac) {}

    public function resolveEndpoint(): string
    {
        return '/onguard-activity/host_mac/'.rawurlencode((string) $this->hostMac);
    }
}
