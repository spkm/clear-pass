<?php

namespace spkm\ClearPass\Requests\GuestConfiguration\DigitalPassTemplate;

use spkm\ClearPass\Data\GuestConfiguration\DigitalPassTemplate;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of pass templates: GET /template/pass.
 */
class GetDigitalPassTemplatesRequest extends ListRequest
{
    protected ?string $dto = DigitalPassTemplate::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/template/pass';
    }
}
