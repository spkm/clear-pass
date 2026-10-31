<?php

namespace spkm\ClearPass\Requests\GuestConfiguration\WebLogin;

use spkm\ClearPass\Data\GuestConfiguration\WebLogin;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a web login page: GET /weblogin/{id}.
 */
class GetWebLoginRequest extends ItemRequest
{
    protected ?string $dto = WebLogin::class;

    public function __construct(protected int|string $id) {}

    public function resolveEndpoint(): string
    {
        return '/weblogin/'.rawurlencode((string) $this->id);
    }
}
