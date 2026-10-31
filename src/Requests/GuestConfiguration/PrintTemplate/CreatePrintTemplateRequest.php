<?php

namespace spkm\ClearPass\Requests\GuestConfiguration\PrintTemplate;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GuestConfiguration\PrintTemplate;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new print template: POST /template/print.
 */
class CreatePrintTemplateRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = PrintTemplate::class;

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
        return '/template/print';
    }
}
