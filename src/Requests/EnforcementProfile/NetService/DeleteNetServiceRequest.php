<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\NetService;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Net Service: DELETE /enforcement-profile-dur/net-service/{product_name}/{net_service_id}.
 */
class DeleteNetServiceRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected int $netServiceId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/net-service/'.rawurlencode((string) $this->productName).'/'.$this->netServiceId;
    }
}
