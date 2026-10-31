<?php

namespace spkm\ClearPass\Requests\Integrations\ExtensionInstanceStart;

use Saloon\Enums\Method;
use spkm\ClearPass\Requests\ActionRequest;

/**
 * Start an installed extension: POST /extension/instance/{id}/start.
 */
class StartExtensionInstanceRequest extends ActionRequest
{
    protected Method $method = Method::POST;

    protected string $responseShape = self::NONE;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/extension/instance/'.rawurlencode((string) $this->id).'/start';
    }
}
