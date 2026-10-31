<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSProxyTarget;

use spkm\ClearPass\Data\PolicyElements\RADIUSProxyTarget;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a proxy target by name: GET /proxy-target/name/{name}.
 */
class GetRADIUSProxyTargetByNameRequest extends ItemRequest
{
    protected ?string $dto = RADIUSProxyTarget::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/proxy-target/name/'.rawurlencode((string) $this->name);
    }
}
