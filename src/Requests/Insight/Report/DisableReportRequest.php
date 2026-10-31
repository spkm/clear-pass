<?php

namespace spkm\ClearPass\Requests\Insight\Report;

use Saloon\Enums\Method;
use spkm\ClearPass\Data\Insight\Report;
use spkm\ClearPass\Requests\ActionRequest;

/**
 * Disable an Insight report configuration by id: PATCH /report/{id}/disable.
 */
class DisableReportRequest extends ActionRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = Report::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/report/'.$this->id.'/disable';
    }
}
