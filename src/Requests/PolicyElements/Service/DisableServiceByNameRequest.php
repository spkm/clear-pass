<?php

namespace spkm\ClearPass\Requests\PolicyElements\Service;

use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\Service;
use spkm\ClearPass\Requests\ActionRequest;

/**
 * Disable a Service by name: PATCH /config/service/name/{services_name}/disable.
 */
class DisableServiceByNameRequest extends ActionRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = Service::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $servicesName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/config/service/name/'.rawurlencode((string) $this->servicesName).'/disable';
    }
}
