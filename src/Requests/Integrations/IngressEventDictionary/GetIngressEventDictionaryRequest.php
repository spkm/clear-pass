<?php

namespace spkm\ClearPass\Requests\Integrations\IngressEventDictionary;

use spkm\ClearPass\Data\Integrations\IngressEventDictionary;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an Ingress Event Dictionary: GET /ingress-event-dictionary/{ingress_event_dictionary_id}.
 */
class GetIngressEventDictionaryRequest extends ItemRequest
{
    protected ?string $dto = IngressEventDictionary::class;

    public function __construct(protected int $ingressEventDictionaryId) {}

    public function resolveEndpoint(): string
    {
        return '/ingress-event-dictionary/'.$this->ingressEventDictionaryId;
    }
}
