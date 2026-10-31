<?php

namespace spkm\ClearPass\Requests\CertificateAuthority\OnboardUser;

use spkm\ClearPass\Data\CertificateAuthority\OnboardUser;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a user: GET /user/{id}.
 */
class GetOnboardUserRequest extends ItemRequest
{
    protected ?string $dto = OnboardUser::class;

    public function __construct(protected int|string $id) {}

    public function resolveEndpoint(): string
    {
        return '/user/'.rawurlencode((string) $this->id);
    }
}
