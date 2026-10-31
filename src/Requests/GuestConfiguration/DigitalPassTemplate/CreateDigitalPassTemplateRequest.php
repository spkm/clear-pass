<?php

namespace spkm\ClearPass\Requests\GuestConfiguration\DigitalPassTemplate;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GuestConfiguration\DigitalPassTemplate;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new pass template: POST /template/pass.
 */
class CreateDigitalPassTemplateRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = DigitalPassTemplate::class;

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
        return '/template/pass';
    }
}
