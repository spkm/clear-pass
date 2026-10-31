<?php

namespace spkm\ClearPass\Requests\Integrations\IngressEventDictionary;

use spkm\ClearPass\Data\Integrations\IngressEventDictionary;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of Ingress Event Dictionaries: GET /ingress-event-dictionary.
 */
class GetIngressEventDictionariesRequest extends ListRequest
{
    protected ?string $dto = IngressEventDictionary::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/ingress-event-dictionary';
    }
}
