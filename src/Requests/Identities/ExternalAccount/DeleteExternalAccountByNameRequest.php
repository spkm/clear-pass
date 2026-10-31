<?php

namespace spkm\ClearPass\Requests\Identities\ExternalAccount;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an external account by name: DELETE /external-account/name/{name}.
 */
class DeleteExternalAccountByNameRequest extends DeleteRequest
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
        return '/external-account/name/'.rawurlencode((string) $this->name);
    }
}
