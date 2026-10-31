<?php

namespace spkm\ClearPass\Requests\LocalServerConfiguration\AccessControl;

use spkm\ClearPass\Data\LocalServerConfiguration\AccessControl;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an application access control by resource name: GET /server/access-control/{server_uuid}/{resource_name}.
 */
class GetAccessControlByResourceNameRequest extends ItemRequest
{
    protected ?string $dto = AccessControl::class;

    public function __construct(protected string $serverUuid, protected string $resourceName) {}

    public function resolveEndpoint(): string
    {
        return '/server/access-control/'.rawurlencode((string) $this->serverUuid).'/'.rawurlencode((string) $this->resourceName);
    }
}
