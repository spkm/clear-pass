<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSProxyTarget;

use spkm\ClearPass\Data\PolicyElements\RADIUSProxyTarget;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a proxy target: GET /proxy-target/{proxy_target_id}.
 */
class GetRADIUSProxyTargetRequest extends ItemRequest
{
    protected ?string $dto = RADIUSProxyTarget::class;

    public function __construct(protected int $proxyTargetId) {}

    public function resolveEndpoint(): string
    {
        return '/proxy-target/'.$this->proxyTargetId;
    }
}
