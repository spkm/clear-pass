<?php

namespace spkm\ClearPass\Requests\Identities\Endpoint;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an endpoint: DELETE /endpoint/{endpoint_id}.
 */
class DeleteEndpointRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $endpointId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/endpoint/'.$this->endpointId;
    }
}
