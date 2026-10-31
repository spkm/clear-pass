<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\ApplicationLicense;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\ApplicationLicense;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update a license by license id: PUT /application-license/{license_id}.
 */
class ReplaceApplicationLicenseRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = ApplicationLicense::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $licenseId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/application-license/'.$this->licenseId;
    }
}
