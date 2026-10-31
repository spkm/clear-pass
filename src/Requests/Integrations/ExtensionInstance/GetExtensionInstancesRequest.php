<?php

namespace spkm\ClearPass\Requests\Integrations\ExtensionInstance;

use spkm\ClearPass\Data\Integrations\ExtensionInstance;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of installed extensions: GET /extension/instance.
 */
class GetExtensionInstancesRequest extends ListRequest
{
    protected ?string $dto = ExtensionInstance::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/extension/instance';
    }
}
