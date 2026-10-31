<?php

namespace spkm\ClearPass\Requests\GuestConfiguration\WebLogin;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a web login page by page-name: DELETE /weblogin/page-name/{page-name}.
 */
class DeleteWebLoginByPageNameRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $pageName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/weblogin/page-name/'.rawurlencode((string) $this->pageName);
    }
}
