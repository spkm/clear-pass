<?php

namespace spkm\ClearPass\Requests\PolicyElements\Service;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\Service;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new Service: POST /config/service.
 */
class CreateServiceRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = Service::class;

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
        return '/config/service';
    }
}
