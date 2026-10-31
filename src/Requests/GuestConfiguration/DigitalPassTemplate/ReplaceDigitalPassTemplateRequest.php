<?php

namespace spkm\ClearPass\Requests\GuestConfiguration\DigitalPassTemplate;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GuestConfiguration\DigitalPassTemplate;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a pass template: PUT /template/pass/{id}.
 */
class ReplaceDigitalPassTemplateRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = DigitalPassTemplate::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/template/pass/'.rawurlencode((string) $this->id);
    }
}
