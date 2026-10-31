<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\MACAccessControlList;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\MACAccessControlList;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Add a MAC Access Control List: POST /enforcement-profile-dur/mac-access-control-list/{product_name}.
 */
class CreateMACAccessControlListRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = MACAccessControlList::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/mac-access-control-list/'.rawurlencode((string) $this->productName);
    }
}
