<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\QoSProfile;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a QoS Profile by name: DELETE /enforcement-profile-dur/qos-profile/{product_name}/name/{name}.
 */
class DeleteQoSProfileByNameRequest extends DeleteRequest
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
        return '/enforcement-profile-dur/qos-profile/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
