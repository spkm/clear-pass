<?php

namespace spkm\ClearPass\Requests\Insight\Alert;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Insight\Alert;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Partial update of an Insight alert configuration by id: PATCH /alert/{id}.
 */
class UpdateAlertRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = Alert::class;

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
        return '/alert/'.$this->id;
    }
}
