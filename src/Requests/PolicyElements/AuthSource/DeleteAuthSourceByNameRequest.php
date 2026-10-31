<?php

namespace spkm\ClearPass\Requests\PolicyElements\AuthSource;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an authentication source by name: DELETE /auth-source/name/{name}.
 */
class DeleteAuthSourceByNameRequest extends DeleteRequest
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
        return '/auth-source/name/'.rawurlencode((string) $this->name);
    }
}
