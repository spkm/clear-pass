<?php

namespace spkm\ClearPass\Requests\Insight\Report;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Insight\Report;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Partial update of an Insight report configuration by id: PATCH /report/{id}.
 */
class UpdateReportRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = Report::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/report/'.$this->id;
    }
}
