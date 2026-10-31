<?php

namespace spkm\ClearPass\Requests\Integrations\ExtensionInstance;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Integrations\ExtensionInstance;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Change the state of an installed extension: PATCH /extension/instance/{id}.
 */
class UpdateExtensionInstanceRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

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
        return '/extension/instance/'.rawurlencode((string) $this->id);
    }
}
