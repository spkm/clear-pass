<?php

namespace spkm\ClearPass\Requests\CertificateAuthority\OnboardUser;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\CertificateAuthority\OnboardUser;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update settings for a user: PATCH /user/{id}.
 */
class UpdateOnboardUserRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = OnboardUser::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/user/'.rawurlencode((string) $this->id);
    }
}
