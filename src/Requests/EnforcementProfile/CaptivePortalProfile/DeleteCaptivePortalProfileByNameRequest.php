<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\CaptivePortalProfile;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Captive Portal Profile by name: DELETE /enforcement-profile-dur/captive-portal-profile/{product_name}/name/{name}.
 */
class DeleteCaptivePortalProfileByNameRequest extends DeleteRequest
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
        return '/enforcement-profile-dur/captive-portal-profile/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
