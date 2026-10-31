<?php

namespace spkm\ClearPass\Requests\Integrations\IngressEventDictionary;

use spkm\ClearPass\Data\Integrations\IngressEventDictionary;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an Ingress Event Dictionary by format_name: GET /ingress-event-dictionary/format_name/{format_name}.
 */
class GetIngressEventDictionaryByFormatNameRequest extends ItemRequest
{
    protected ?string $dto = IngressEventDictionary::class;

    public function __construct(protected string $formatName) {}

    public function resolveEndpoint(): string
    {
        return '/ingress-event-dictionary/format_name/'.rawurlencode((string) $this->formatName);
    }
}
