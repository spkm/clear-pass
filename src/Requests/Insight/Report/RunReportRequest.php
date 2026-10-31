<?php

namespace spkm\ClearPass\Requests\Insight\Report;

use Saloon\Enums\Method;
use spkm\ClearPass\Data\Insight\Report;
use spkm\ClearPass\Requests\ActionRequest;

/**
 * Run an Insight report by id: POST /report/{id}/run.
 */
class RunReportRequest extends ActionRequest
{
    protected Method $method = Method::POST;

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
        return '/report/'.$this->id.'/run';
    }
}
