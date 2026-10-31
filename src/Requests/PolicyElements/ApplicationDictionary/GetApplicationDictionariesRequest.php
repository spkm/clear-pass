<?php

namespace spkm\ClearPass\Requests\PolicyElements\ApplicationDictionary;

use spkm\ClearPass\Data\PolicyElements\ApplicationDictionary;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of Application Dictionaries: GET /application-dictionary.
 */
class GetApplicationDictionariesRequest extends ListRequest
{
    protected ?string $dto = ApplicationDictionary::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/application-dictionary';
    }
}
