<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\NetDestination;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Net Destination by name: DELETE /enforcement-profile-dur/net-destination/{product_name}/name/{name}.
 */
class DeleteNetDestinationByNameRequest extends DeleteRequest
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
        return '/enforcement-profile-dur/net-destination/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
