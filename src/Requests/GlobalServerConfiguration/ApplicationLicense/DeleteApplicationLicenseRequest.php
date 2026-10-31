<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\ApplicationLicense;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a license by license id: DELETE /application-license/{license_id}.
 */
class DeleteApplicationLicenseRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $licenseId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/application-license/'.$this->licenseId;
    }
}
