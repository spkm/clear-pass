<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\SessionAccessControlList;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Session Access Control List: DELETE /enforcement-profile-dur/session-access-control-list/{product_name}/{session_access_control_list_id}.
 */
class DeleteSessionAccessControlListRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected int $sessionAccessControlListId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/session-access-control-list/'.rawurlencode((string) $this->productName).'/'.$this->sessionAccessControlListId;
    }
}
