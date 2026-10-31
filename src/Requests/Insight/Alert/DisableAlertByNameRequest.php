<?php

namespace spkm\ClearPass\Requests\Insight\Alert;

use Saloon\Enums\Method;
use spkm\ClearPass\Data\Insight\Alert;
use spkm\ClearPass\Requests\ActionRequest;

/**
 * Disable an Insight alert configuration by name: PATCH /alert/{name}/disable.
 */
class DisableAlertByNameRequest extends ActionRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = Alert::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/alert/'.rawurlencode((string) $this->name).'/disable';
    }
}
