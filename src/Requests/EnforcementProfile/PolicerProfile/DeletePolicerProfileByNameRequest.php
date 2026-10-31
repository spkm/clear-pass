<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\PolicerProfile;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Policer Profile by name: DELETE /enforcement-profile-dur/policer-profile/{product_name}/name/{name}.
 */
class DeletePolicerProfileByNameRequest extends DeleteRequest
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
        return '/enforcement-profile-dur/policer-profile/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
