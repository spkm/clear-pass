<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\SessionAccessControlList;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Session Access Control List by name: DELETE /enforcement-profile-dur/session-access-control-list/{product_name}/name/{name}.
 */
class DeleteSessionAccessControlListByNameRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/session-access-control-list/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
