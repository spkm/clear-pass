<?php

namespace spkm\ClearPass\Resources\Integrations;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Integrations\ExtensionInstanceConfig;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\Integrations\ExtensionInstanceConfig\GetExtensionInstanceConfigRequest;
use spkm\ClearPass\Requests\Integrations\ExtensionInstanceConfig\ReplaceExtensionInstanceConfigRequest;
use spkm\ClearPass\Resources\SingletonResource;

/**
 * Configure an installed extension, from ClearPass::integrations()->extensionInstanceConfig().
 *
 * @extends SingletonResource<ExtensionInstanceConfig>
 */
class ExtensionInstanceConfigResource extends SingletonResource
{
    public function __construct(ClearPassConnector $connector, protected int|string $id)
    {
        parent::__construct($connector, ExtensionInstanceConfig::class);
    }

    protected function getRequest(array $options): ClearPassRequest
    {
        return new GetExtensionInstanceConfigRequest($this->id);
    }

    protected function replaceRequest(array $body, array $options): ClearPassRequest
    {
        return new ReplaceExtensionInstanceConfigRequest($this->id, $body, $options);
    }
}
