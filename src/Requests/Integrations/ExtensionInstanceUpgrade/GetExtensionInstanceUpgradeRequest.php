<?php

namespace spkm\ClearPass\Requests\Integrations\ExtensionInstanceUpgrade;

use spkm\ClearPass\Data\Integrations\ExtensionInstance;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get information on an extension's available upgrade: GET /extension/instance/{id}/upgrade.
 */
class GetExtensionInstanceUpgradeRequest extends ItemRequest
{
    protected ?string $dto = ExtensionInstance::class;

    public function __construct(protected int|string $id) {}

    public function resolveEndpoint(): string
    {
        return '/extension/instance/'.rawurlencode((string) $this->id).'/upgrade';
    }
}
