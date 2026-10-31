<?php

namespace spkm\ClearPass\Requests\Integrations\ExtensionStore;

use spkm\ClearPass\Data\Integrations\ExtensionStore;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get details of an extension in the store: GET /extension/store/{id}.
 */
class GetExtensionStoreRequest extends ItemRequest
{
    protected ?string $dto = ExtensionStore::class;

    public function __construct(protected int|string $id) {}

    public function resolveEndpoint(): string
    {
        return '/extension/store/'.rawurlencode((string) $this->id);
    }
}
