<?php

namespace spkm\ClearPass\Requests\Integrations\ExtensionInstanceStop;

use Saloon\Enums\Method;
use spkm\ClearPass\Requests\ActionRequest;

/**
 * Stop an installed extension: POST /extension/instance/{id}/stop.
 */
class StopExtensionInstanceRequest extends ActionRequest
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
        return '/extension/instance/'.rawurlencode((string) $this->id).'/stop';
    }
}
