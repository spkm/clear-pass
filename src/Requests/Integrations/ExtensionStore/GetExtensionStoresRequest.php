<?php

namespace spkm\ClearPass\Requests\Integrations\ExtensionStore;

use spkm\ClearPass\Data\Integrations\ExtensionStore;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Find a extension in the store: GET /extension/store.
 */
class GetExtensionStoresRequest extends ListRequest
{
    protected ?string $dto = ExtensionStore::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/extension/store';
    }
}
