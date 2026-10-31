<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\Policy;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Policy by name: DELETE /enforcement-profile-dur/policy/{product_name}/name/{name}.
 */
class DeletePolicyByNameRequest extends DeleteRequest
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
        return '/enforcement-profile-dur/policy/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
