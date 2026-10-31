<?php

namespace spkm\ClearPass\Requests\LocalServerConfiguration\AccessControl;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an application access control by resource name: DELETE /server/access-control/{server_uuid}/{resource_name}.
 */
class DeleteAccessControlByResourceNameRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serverUuid, protected string $resourceName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/server/access-control/'.rawurlencode((string) $this->serverUuid).'/'.rawurlencode((string) $this->resourceName);
    }
}
