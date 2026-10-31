<?php

namespace spkm\ClearPass\Requests\CertificateAuthority\OnboardUser;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a user: DELETE /user/{id}.
 */
class DeleteOnboardUserRequest extends DeleteRequest
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
        return '/user/'.rawurlencode((string) $this->id);
    }
}
