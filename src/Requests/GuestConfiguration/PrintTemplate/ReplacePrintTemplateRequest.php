<?php

namespace spkm\ClearPass\Requests\GuestConfiguration\PrintTemplate;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GuestConfiguration\PrintTemplate;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a print template: PUT /template/print/{id}.
 */
class ReplacePrintTemplateRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = PrintTemplate::class;

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
        return '/template/print/'.rawurlencode((string) $this->id);
    }
}
