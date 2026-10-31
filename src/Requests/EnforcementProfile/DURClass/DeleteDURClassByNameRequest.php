<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\DURClass;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a DUR Class by name: DELETE /enforcement-profile-dur/dur-class/{product_name}/name/{name}.
 */
class DeleteDURClassByNameRequest extends DeleteRequest
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
        return '/enforcement-profile-dur/dur-class/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
