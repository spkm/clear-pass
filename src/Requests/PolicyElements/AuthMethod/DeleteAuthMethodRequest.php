<?php

namespace spkm\ClearPass\Requests\PolicyElements\AuthMethod;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an authentication method: DELETE /auth-method/{auth_method_id}.
 */
class DeleteAuthMethodRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $authMethodId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/auth-method/'.$this->authMethodId;
    }
}
