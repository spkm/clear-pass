<?php

namespace spkm\ClearPass\Requests\Integrations\ExtensionInstanceConfig;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Integrations\ExtensionInstanceConfig;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Set the configuration of an installed extension: PUT /extension/instance/{id}/config.
 */
class ReplaceExtensionInstanceConfigRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = ExtensionInstanceConfig::class;

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
        return '/extension/instance/'.rawurlencode((string) $this->id).'/config';
    }
}
