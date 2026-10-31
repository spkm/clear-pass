<?php

namespace spkm\ClearPass\Requests\Insight\Report;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Insight\Report;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create an Insight report configuration: POST /report.
 */
class CreateReportRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = Report::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/report';
    }
}
