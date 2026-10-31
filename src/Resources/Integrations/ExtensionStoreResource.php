<?php

namespace spkm\ClearPass\Resources\Integrations;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Integrations\ExtensionStore;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\Integrations\ExtensionStore\GetExtensionStoreRequest;
use spkm\ClearPass\Requests\Integrations\ExtensionStore\GetExtensionStoresRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Query the extension store, from ClearPass::integrations()->extensionStores().
 *
 * @extends Builder<ExtensionStore>
 */
class ExtensionStoreResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, ExtensionStore::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetExtensionStoresRequest($query);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetExtensionStoreRequest($id);
    }
}
