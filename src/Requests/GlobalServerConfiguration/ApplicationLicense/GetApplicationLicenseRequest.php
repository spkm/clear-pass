<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\ApplicationLicense;

use spkm\ClearPass\Data\GlobalServerConfiguration\ApplicationLicense;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a license by license id: GET /application-license/{license_id}.
 */
class GetApplicationLicenseRequest extends ItemRequest
{
    protected ?string $dto = ApplicationLicense::class;

    public function __construct(protected int $licenseId) {}

    public function resolveEndpoint(): string
    {
        return '/application-license/'.$this->licenseId;
    }
}
