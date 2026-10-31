<?php

namespace spkm\ClearPass\Requests\Integrations\ExtensionInstanceConfig;

use spkm\ClearPass\Data\Integrations\ExtensionInstanceConfig;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get the configuration of an installed extension: GET /extension/instance/{id}/config.
 */
class GetExtensionInstanceConfigRequest extends ItemRequest
{
    protected ?string $dto = ExtensionInstanceConfig::class;

    public function __construct(protected int|string $id) {}

    public function resolveEndpoint(): string
    {
        return '/extension/instance/'.rawurlencode((string) $this->id).'/config';
    }
}
