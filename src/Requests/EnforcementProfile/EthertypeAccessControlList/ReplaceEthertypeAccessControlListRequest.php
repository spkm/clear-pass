<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\EthertypeAccessControlList;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\EthertypeAccessControlList;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a Ethertype Access Control List: PUT /enforcement-profile-dur/ethertype-access-control-list/{product_name}/{ethertype_access_control_list_id}.
 */
class ReplaceEthertypeAccessControlListRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = EthertypeAccessControlList::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected int $ethertypeAccessControlListId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/ethertype-access-control-list/'.rawurlencode((string) $this->productName).'/'.$this->ethertypeAccessControlListId;
    }
}
