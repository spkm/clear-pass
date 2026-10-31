<?php

namespace spkm\ClearPass\Resources\Integrations;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Integrations\ExtensionInstance;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\Integrations\ExtensionInstance\CreateExtensionInstanceRequest;
use spkm\ClearPass\Requests\Integrations\ExtensionInstance\DeleteExtensionInstanceRequest;
use spkm\ClearPass\Requests\Integrations\ExtensionInstance\GetExtensionInstanceRequest;
use spkm\ClearPass\Requests\Integrations\ExtensionInstance\GetExtensionInstancesRequest;
use spkm\ClearPass\Requests\Integrations\ExtensionInstance\UpdateExtensionInstanceRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage the system’s installed extensions, from ClearPass::integrations()->extensionInstances().
 *
 * @extends Builder<ExtensionInstance>
 */
class ExtensionInstanceResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, ExtensionInstance::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetExtensionInstancesRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateExtensionInstanceRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetExtensionInstanceRequest($id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateExtensionInstanceRequest($id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteExtensionInstanceRequest($id, $options);
    }
}
