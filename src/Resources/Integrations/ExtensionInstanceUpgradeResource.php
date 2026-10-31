<?php

namespace spkm\ClearPass\Resources\Integrations;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\Integrations\ExtensionInstance;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\Integrations\ExtensionInstanceUpgrade\GetExtensionInstanceUpgradeRequest;
use spkm\ClearPass\Requests\Integrations\ExtensionInstanceUpgrade\UpgradeExtensionInstanceRequest;
use spkm\ClearPass\Resources\SingletonResource;

/**
 * Upgrade an extension, from ClearPass::integrations()->extensionInstanceUpgrade().
 *
 * @extends SingletonResource<ExtensionInstance>
 */
class ExtensionInstanceUpgradeResource extends SingletonResource
{
    public function __construct(ClearPassConnector $connector, protected int|string $id)
    {
        parent::__construct($connector, ExtensionInstance::class);
    }

    protected function getRequest(array $options): ClearPassRequest
    {
        return new GetExtensionInstanceUpgradeRequest($this->id);
    }

    /**
     * Upgrade an extension: POST /extension/instance/{id}/upgrade.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function upgrade(array|Data $attributes = [], array $options = []): ?ExtensionInstance
    {
        return $this->fetch(new UpgradeExtensionInstanceRequest($this->id, $this->payloadOf($attributes), $options));
    }
}
