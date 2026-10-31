<?php

namespace spkm\ClearPass\Requests\Integrations\ExtensionInstanceRestart;

use Saloon\Enums\Method;
use spkm\ClearPass\Requests\ActionRequest;

/**
 * Restart an installed extension: POST /extension/instance/{id}/restart.
 */
class RestartExtensionInstanceRequest extends ActionRequest
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
        return '/extension/instance/'.rawurlencode((string) $this->id).'/restart';
    }
}
