<?php

namespace spkm\ClearPass\Requests\GuestConfiguration\WebLogin;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a web login page: DELETE /weblogin/{id}.
 */
class DeleteWebLoginRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/weblogin/'.rawurlencode((string) $this->id);
    }
}
