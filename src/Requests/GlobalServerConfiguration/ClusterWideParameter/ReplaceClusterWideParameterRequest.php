<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\ClusterWideParameter;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\ClusterWideParameter;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace cluster wide parameters: PUT /cluster/parameters.
 */
class ReplaceClusterWideParameterRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = ClusterWideParameter::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/cluster/parameters';
    }
}
