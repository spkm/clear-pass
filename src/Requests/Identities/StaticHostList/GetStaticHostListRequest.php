<?php

namespace spkm\ClearPass\Requests\Identities\StaticHostList;

use spkm\ClearPass\Data\Identities\StaticHostList;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a static host list: GET /static-host-list/{static_host_list_id}.
 */
class GetStaticHostListRequest extends ItemRequest
{
    protected ?string $dto = StaticHostList::class;

    public function __construct(protected int $staticHostListId) {}

    public function resolveEndpoint(): string
    {
        return '/static-host-list/'.$this->staticHostListId;
    }
}
