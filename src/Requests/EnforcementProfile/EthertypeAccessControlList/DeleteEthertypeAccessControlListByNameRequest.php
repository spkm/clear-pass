<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\EthertypeAccessControlList;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Ethertype Access Control List by name: DELETE /enforcement-profile-dur/ethertype-access-control-list/{product_name}/name/{name}.
 */
class DeleteEthertypeAccessControlListByNameRequest extends DeleteRequest
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
        return '/enforcement-profile-dur/ethertype-access-control-list/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
