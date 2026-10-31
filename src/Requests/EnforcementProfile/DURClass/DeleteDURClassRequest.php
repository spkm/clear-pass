<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\DURClass;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a DUR Class: DELETE /enforcement-profile-dur/dur-class/{product_name}/{dur_class_id}.
 */
class DeleteDURClassRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected int $durClassId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/dur-class/'.rawurlencode((string) $this->productName).'/'.$this->durClassId;
    }
}
