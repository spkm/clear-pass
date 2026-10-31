<?php

namespace spkm\ClearPass\Requests\LocalServerConfiguration\SystemServiceControl;

use Saloon\Enums\Method;
use spkm\ClearPass\Data\LocalServerConfiguration\SystemServiceControl;
use spkm\ClearPass\Requests\ActionRequest;

/**
 * Stop a service by name: PATCH /server/service/{server_uuid}/{service_name}/stop.
 */
class StopSystemServiceByServiceNameRequest extends ActionRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = SystemServiceControl::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serverUuid, protected string $serviceName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/server/service/'.rawurlencode((string) $this->serverUuid).'/'.rawurlencode((string) $this->serviceName).'/stop';
    }
}
