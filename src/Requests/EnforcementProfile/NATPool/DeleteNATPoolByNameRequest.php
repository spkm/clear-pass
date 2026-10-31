<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\NATPool;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a NAT Pool by name: DELETE /enforcement-profile-dur/nat-pool/{product_name}/name/{name}.
 */
class DeleteNATPoolByNameRequest extends DeleteRequest
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
        return '/enforcement-profile-dur/nat-pool/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
