<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\NATPool;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a NAT Pool: DELETE /enforcement-profile-dur/nat-pool/{product_name}/{nat_pool_id}.
 */
class DeleteNATPoolRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected int $natPoolId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/nat-pool/'.rawurlencode((string) $this->productName).'/'.$this->natPoolId;
    }
}
