<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\StatelessAccessControlList;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Stateless Access Control List: DELETE /enforcement-profile-dur/stateless-access-control-list/{product_name}/{stateless_access_control_list_id}.
 */
class DeleteStatelessAccessControlListRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected int $statelessAccessControlListId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/stateless-access-control-list/'.rawurlencode((string) $this->productName).'/'.$this->statelessAccessControlListId;
    }
}
