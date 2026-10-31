<?php

namespace spkm\ClearPass\Requests\PolicyElements\Service;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Service by name: DELETE /config/service/name/{services_name}.
 */
class DeleteServiceByNameRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $servicesName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/config/service/name/'.rawurlencode((string) $this->servicesName);
    }
}
