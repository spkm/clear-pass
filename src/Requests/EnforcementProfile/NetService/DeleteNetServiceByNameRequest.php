<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\NetService;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Net Service by name: DELETE /enforcement-profile-dur/net-service/{product_name}/name/{name}.
 */
class DeleteNetServiceByNameRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/net-service/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
