<?php

namespace spkm\ClearPass\Requests\Integrations\EventSources;

use spkm\ClearPass\Data\Integrations\EventSources;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of event sources: GET /event-sources.
 */
class GetEventSourcesRequest extends ListRequest
{
    protected ?string $dto = EventSources::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/event-sources';
    }
}
