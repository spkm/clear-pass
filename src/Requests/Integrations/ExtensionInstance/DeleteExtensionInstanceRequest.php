<?php

namespace spkm\ClearPass\Requests\Integrations\ExtensionInstance;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Uninstall an extension: DELETE /extension/instance/{id}.
 */
class DeleteExtensionInstanceRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: force
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/extension/instance/'.rawurlencode((string) $this->id);
    }
}
