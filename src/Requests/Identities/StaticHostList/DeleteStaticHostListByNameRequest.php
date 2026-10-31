<?php

namespace spkm\ClearPass\Requests\Identities\StaticHostList;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a static host list by name: DELETE /static-host-list/name/{name}.
 */
class DeleteStaticHostListByNameRequest extends DeleteRequest
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
        return '/static-host-list/name/'.rawurlencode((string) $this->name);
    }
}
