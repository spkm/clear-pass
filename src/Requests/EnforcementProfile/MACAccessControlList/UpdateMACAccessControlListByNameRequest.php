<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\MACAccessControlList;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\MACAccessControlList;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a MAC Access Control List by name: PATCH /enforcement-profile-dur/mac-access-control-list/{product_name}/name/{name}.
 */
class UpdateMACAccessControlListByNameRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = MACAccessControlList::class;

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
        return '/enforcement-profile-dur/mac-access-control-list/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
