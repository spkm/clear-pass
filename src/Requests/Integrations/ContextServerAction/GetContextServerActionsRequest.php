<?php

namespace spkm\ClearPass\Requests\Integrations\ContextServerAction;

use spkm\ClearPass\Data\Integrations\ContextServerAction;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of Context Server Actions: GET /context-server-action.
 */
class GetContextServerActionsRequest extends ListRequest
{
    protected ?string $dto = ContextServerAction::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/context-server-action';
    }
}
