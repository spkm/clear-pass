<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\AdminUser;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an admin user: DELETE /admin-user/{id}.
 */
class DeleteAdminUserRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/admin-user/'.$this->id;
    }
}
