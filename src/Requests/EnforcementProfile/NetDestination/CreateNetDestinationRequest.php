<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\NetDestination;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\NetDestination;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Add a Net Destination: POST /enforcement-profile-dur/net-destination/{product_name}.
 */
class CreateNetDestinationRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = NetDestination::class;

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
        return '/enforcement-profile-dur/net-destination/'.rawurlencode((string) $this->productName);
    }
}
