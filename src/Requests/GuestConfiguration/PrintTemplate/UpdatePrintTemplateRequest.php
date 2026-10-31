<?php

namespace spkm\ClearPass\Requests\GuestConfiguration\PrintTemplate;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GuestConfiguration\PrintTemplate;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a print template: PATCH /template/print/{id}.
 */
class UpdatePrintTemplateRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

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
