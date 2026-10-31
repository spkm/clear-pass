<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\VoIPProfile;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a VoIP Profile by name: DELETE /enforcement-profile-dur/voip-profile/{product_name}/name/{name}.
 */
class DeleteVoIPProfileByNameRequest extends DeleteRequest
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
        return '/enforcement-profile-dur/voip-profile/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
