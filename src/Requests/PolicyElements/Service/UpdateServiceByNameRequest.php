<?php

namespace spkm\ClearPass\Requests\PolicyElements\Service;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\Service;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a Service by name: PATCH /config/service/name/{services_name}.
 */
class UpdateServiceByNameRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = Service::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $servicesName, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/config/service/name/'.rawurlencode((string) $this->servicesName);
    }
}
