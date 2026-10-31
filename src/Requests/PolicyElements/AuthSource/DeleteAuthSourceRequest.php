<?php

namespace spkm\ClearPass\Requests\PolicyElements\AuthSource;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an authentication source: DELETE /auth-source/{auth_source_id}.
 */
class DeleteAuthSourceRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $authSourceId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/auth-source/'.$this->authSourceId;
    }
}
