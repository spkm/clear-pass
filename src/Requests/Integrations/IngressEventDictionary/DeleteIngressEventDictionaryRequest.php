<?php

namespace spkm\ClearPass\Requests\Integrations\IngressEventDictionary;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an Ingress Event Dictionary: DELETE /ingress-event-dictionary/{ingress_event_dictionary_id}.
 */
class DeleteIngressEventDictionaryRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $ingressEventDictionaryId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/ingress-event-dictionary/'.$this->ingressEventDictionaryId;
    }
}
