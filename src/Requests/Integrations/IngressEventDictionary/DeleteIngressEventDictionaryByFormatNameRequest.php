<?php

namespace spkm\ClearPass\Requests\Integrations\IngressEventDictionary;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an Ingress Event Dictionary by format_name: DELETE /ingress-event-dictionary/format_name/{format_name}.
 */
class DeleteIngressEventDictionaryByFormatNameRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $formatName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/ingress-event-dictionary/format_name/'.rawurlencode((string) $this->formatName);
    }
}
