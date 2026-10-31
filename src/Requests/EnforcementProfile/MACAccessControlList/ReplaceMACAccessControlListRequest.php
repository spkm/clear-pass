<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\MACAccessControlList;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\MACAccessControlList;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a MAC Access Control List: PUT /enforcement-profile-dur/mac-access-control-list/{product_name}/{mac_access_control_list_id}.
 */
class ReplaceMACAccessControlListRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = MACAccessControlList::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected int $macAccessControlListId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/mac-access-control-list/'.rawurlencode((string) $this->productName).'/'.$this->macAccessControlListId;
    }
}
