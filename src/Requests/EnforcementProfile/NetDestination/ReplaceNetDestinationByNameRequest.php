<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\NetDestination;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\NetDestination;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a Net Destination by name: PUT /enforcement-profile-dur/net-destination/{product_name}/name/{name}.
 */
class ReplaceNetDestinationByNameRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = NetDestination::class;

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
        return '/enforcement-profile-dur/net-destination/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
