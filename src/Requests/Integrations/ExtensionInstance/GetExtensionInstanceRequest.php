<?php

namespace spkm\ClearPass\Requests\Integrations\ExtensionInstance;

use spkm\ClearPass\Data\Integrations\ExtensionInstance;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get details of an installed extension: GET /extension/instance/{id}.
 */
class GetExtensionInstanceRequest extends ItemRequest
{
    protected ?string $dto = ExtensionInstance::class;

    public function __construct(protected int|string $id) {}

    public function resolveEndpoint(): string
    {
        return '/extension/instance/'.rawurlencode((string) $this->id);
    }
}
