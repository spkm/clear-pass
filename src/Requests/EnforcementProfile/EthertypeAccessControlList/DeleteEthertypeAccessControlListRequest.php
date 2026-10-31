<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\EthertypeAccessControlList;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Ethertype Access Control List: DELETE /enforcement-profile-dur/ethertype-access-control-list/{product_name}/{ethertype_access_control_list_id}.
 */
class DeleteEthertypeAccessControlListRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected int $ethertypeAccessControlListId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/ethertype-access-control-list/'.rawurlencode((string) $this->productName).'/'.$this->ethertypeAccessControlListId;
    }
}
