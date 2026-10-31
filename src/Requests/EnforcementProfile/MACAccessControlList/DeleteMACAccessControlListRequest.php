<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\MACAccessControlList;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a MAC Access Control List: DELETE /enforcement-profile-dur/mac-access-control-list/{product_name}/{mac_access_control_list_id}.
 */
class DeleteMACAccessControlListRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected int $macAccessControlListId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/mac-access-control-list/'.rawurlencode((string) $this->productName).'/'.$this->macAccessControlListId;
    }
}
