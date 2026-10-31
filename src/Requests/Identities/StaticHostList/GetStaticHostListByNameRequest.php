<?php

namespace spkm\ClearPass\Requests\Identities\StaticHostList;

use spkm\ClearPass\Data\Identities\StaticHostList;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a static host list by name: GET /static-host-list/name/{name}.
 */
class GetStaticHostListByNameRequest extends ItemRequest
{
    protected ?string $dto = StaticHostList::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/static-host-list/name/'.rawurlencode((string) $this->name);
    }
}
