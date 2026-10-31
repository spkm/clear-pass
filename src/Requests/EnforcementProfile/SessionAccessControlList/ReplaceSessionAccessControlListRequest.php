<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\SessionAccessControlList;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\SessionAccessControlList;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a Session Access Control List: PUT /enforcement-profile-dur/session-access-control-list/{product_name}/{session_access_control_list_id}.
 */
class ReplaceSessionAccessControlListRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = SessionAccessControlList::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected int $sessionAccessControlListId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/session-access-control-list/'.rawurlencode((string) $this->productName).'/'.$this->sessionAccessControlListId;
    }
}
