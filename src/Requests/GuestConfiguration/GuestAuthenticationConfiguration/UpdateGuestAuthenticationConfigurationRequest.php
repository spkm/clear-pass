<?php

namespace spkm\ClearPass\Requests\GuestConfiguration\GuestAuthenticationConfiguration;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GuestConfiguration\GuestAuthenticationConfiguration;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Modify settings at Configuration -> Authentication: PATCH /guest/authentication.
 */
class UpdateGuestAuthenticationConfigurationRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = GuestAuthenticationConfiguration::class;

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
        return '/guest/authentication';
    }
}
