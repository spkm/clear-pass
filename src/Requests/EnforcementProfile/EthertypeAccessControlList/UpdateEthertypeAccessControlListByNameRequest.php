<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\EthertypeAccessControlList;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\EthertypeAccessControlList;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update a Ethertype Access Control List by name: PATCH /enforcement-profile-dur/ethertype-access-control-list/{product_name}/name/{name}.
 */
class UpdateEthertypeAccessControlListByNameRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = EthertypeAccessControlList::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected string $name, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/ethertype-access-control-list/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
