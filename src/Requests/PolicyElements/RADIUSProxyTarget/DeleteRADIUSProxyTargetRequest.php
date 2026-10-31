<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSProxyTarget;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a proxy target: DELETE /proxy-target/{proxy_target_id}.
 */
class DeleteRADIUSProxyTargetRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $proxyTargetId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/proxy-target/'.$this->proxyTargetId;
    }
}
