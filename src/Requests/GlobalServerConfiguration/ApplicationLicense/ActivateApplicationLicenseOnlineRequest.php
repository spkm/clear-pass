<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\ApplicationLicense;

use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\ApplicationLicense;
use spkm\ClearPass\Requests\ActionRequest;

/**
 * Activate license online by license id: PATCH /application-license/activate-online/{license_id}.
 */
class ActivateApplicationLicenseOnlineRequest extends ActionRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = ApplicationLicense::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $licenseId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/application-license/activate-online/'.$this->licenseId;
    }
}
