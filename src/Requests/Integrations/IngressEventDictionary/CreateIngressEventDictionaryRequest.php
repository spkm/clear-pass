<?php

namespace spkm\ClearPass\Requests\Integrations\IngressEventDictionary;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Integrations\IngressEventDictionary;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new Ingress Event Dictionary: POST /ingress-event-dictionary.
 */
class CreateIngressEventDictionaryRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = IngressEventDictionary::class;

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
        return '/ingress-event-dictionary';
    }
}
