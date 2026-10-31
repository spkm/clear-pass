<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\StatelessAccessControlList;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\StatelessAccessControlList;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a Stateless Access Control List: PUT /enforcement-profile-dur/stateless-access-control-list/{product_name}/{stateless_access_control_list_id}.
 */
class ReplaceStatelessAccessControlListRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = StatelessAccessControlList::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected int $statelessAccessControlListId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/stateless-access-control-list/'.rawurlencode((string) $this->productName).'/'.$this->statelessAccessControlListId;
    }
}
