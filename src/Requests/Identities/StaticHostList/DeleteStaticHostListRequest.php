<?php

namespace spkm\ClearPass\Requests\Identities\StaticHostList;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a static host list: DELETE /static-host-list/{static_host_list_id}.
 */
class DeleteStaticHostListRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $staticHostListId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/static-host-list/'.$this->staticHostListId;
    }
}
