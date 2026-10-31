<?php

namespace spkm\ClearPass\Requests\Insight\Alert;

use Saloon\Enums\Method;
use spkm\ClearPass\Data\Insight\Alert;
use spkm\ClearPass\Requests\ActionRequest;

/**
 * Enable an Insight alert configuration by id: PATCH /alert/{id}/enable.
 */
class EnableAlertRequest extends ActionRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = Alert::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/alert/'.$this->id.'/enable';
    }
}
