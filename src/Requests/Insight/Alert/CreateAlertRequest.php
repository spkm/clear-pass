<?php

namespace spkm\ClearPass\Requests\Insight\Alert;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Insight\Alert;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create an Insight alert configuration: POST /alert.
 */
class CreateAlertRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = Alert::class;

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
        return '/alert';
    }
}
