<?php

namespace spkm\ClearPass\Requests\PolicyElements\Service;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Service: DELETE /config/service/{services_id}.
 */
class DeleteServiceRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $servicesId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/config/service/'.$this->servicesId;
    }
}
