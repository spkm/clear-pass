<?php

namespace spkm\ClearPass\Requests\PolicyElements\Service;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\Service;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a Service: PATCH /config/service/{services_id}.
 */
class UpdateServiceRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = Service::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $servicesId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/config/service/'.$this->servicesId;
    }
}
