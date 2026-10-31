<?php

namespace spkm\ClearPass\Requests\Integrations\IngressEventDictionary;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Integrations\IngressEventDictionary;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update an Ingress Event Dictionary: PATCH /ingress-event-dictionary/{ingress_event_dictionary_id}.
 */
class UpdateIngressEventDictionaryRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = IngressEventDictionary::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $ingressEventDictionaryId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/ingress-event-dictionary/'.$this->ingressEventDictionaryId;
    }
}
