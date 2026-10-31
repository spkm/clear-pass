<?php

namespace spkm\ClearPass\Requests\PolicyElements\TACACSServiceDictionary;

use spkm\ClearPass\Data\PolicyElements\TACACSServiceDictionary;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of TACACS+ Service Dictionaries: GET /tacacs-service-dictionary.
 */
class GetTACACSServiceDictionariesRequest extends ListRequest
{
    protected ?string $dto = TACACSServiceDictionary::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/tacacs-service-dictionary';
    }
}
