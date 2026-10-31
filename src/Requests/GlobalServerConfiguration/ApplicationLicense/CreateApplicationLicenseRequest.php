<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\ApplicationLicense;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\ApplicationLicense;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new application license: POST /application-license.
 */
class CreateApplicationLicenseRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = ApplicationLicense::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/application-license';
    }
}
