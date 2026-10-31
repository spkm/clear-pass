<?php

namespace spkm\ClearPass\Requests\Integrations\ExtensionInstanceReinstall;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Integrations\ExtensionInstance;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Reinstall an extension: POST /extension/instance/{id}/reinstall.
 */
class ReinstallExtensionInstanceRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = ExtensionInstance::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/extension/instance/'.rawurlencode((string) $this->id).'/reinstall';
    }
}
