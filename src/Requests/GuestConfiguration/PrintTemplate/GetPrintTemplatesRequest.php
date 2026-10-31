<?php

namespace spkm\ClearPass\Requests\GuestConfiguration\PrintTemplate;

use spkm\ClearPass\Data\GuestConfiguration\PrintTemplate;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of print templates: GET /template/print.
 */
class GetPrintTemplatesRequest extends ListRequest
{
    protected ?string $dto = PrintTemplate::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/template/print';
    }
}
