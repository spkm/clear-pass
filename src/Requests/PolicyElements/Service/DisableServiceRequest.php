<?php

namespace spkm\ClearPass\Requests\PolicyElements\Service;

use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\Service;
use spkm\ClearPass\Requests\ActionRequest;

/**
 * Disable a Service: PATCH /config/service/{services_id}/disable.
 */
class DisableServiceRequest extends ActionRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = Service::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $servicesId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/config/service/'.$this->servicesId.'/disable';
    }
}
