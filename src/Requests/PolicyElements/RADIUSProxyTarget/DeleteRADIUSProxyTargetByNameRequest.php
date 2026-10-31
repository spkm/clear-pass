<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSProxyTarget;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a proxy target by name: DELETE /proxy-target/name/{name}.
 */
class DeleteRADIUSProxyTargetByNameRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/proxy-target/name/'.rawurlencode((string) $this->name);
    }
}
