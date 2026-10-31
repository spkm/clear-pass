<?php

namespace spkm\ClearPass\Requests\PolicyElements\AuthMethod;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an authentication method by name: DELETE /auth-method/name/{name}.
 */
class DeleteAuthMethodByNameRequest extends DeleteRequest
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
        return '/auth-method/name/'.rawurlencode((string) $this->name);
    }
}
