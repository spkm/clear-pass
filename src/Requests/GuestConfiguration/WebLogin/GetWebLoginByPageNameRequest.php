<?php

namespace spkm\ClearPass\Requests\GuestConfiguration\WebLogin;

use spkm\ClearPass\Data\GuestConfiguration\WebLogin;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a web login page by page-name: GET /weblogin/page-name/{page-name}.
 */
class GetWebLoginByPageNameRequest extends ItemRequest
{
    protected ?string $dto = WebLogin::class;

    public function __construct(protected string $pageName) {}

    public function resolveEndpoint(): string
    {
        return '/weblogin/page-name/'.rawurlencode((string) $this->pageName);
    }
}
