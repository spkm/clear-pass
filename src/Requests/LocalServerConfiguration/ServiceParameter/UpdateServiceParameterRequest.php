<?php

namespace spkm\ClearPass\Requests\LocalServerConfiguration\ServiceParameter;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\LocalServerConfiguration\ServiceParameterUpdate;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update service parameter values: PATCH /service-parameter/{server_uuid}/{service_id}.
 */
class UpdateServiceParameterRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = ServiceParameterUpdate::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serverUuid, protected int $serviceId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/service-parameter/'.rawurlencode((string) $this->serverUuid).'/'.$this->serviceId;
    }
}
