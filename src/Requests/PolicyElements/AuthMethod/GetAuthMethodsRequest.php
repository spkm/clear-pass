<?php

namespace spkm\ClearPass\Requests\PolicyElements\AuthMethod;

use spkm\ClearPass\Data\PolicyElements\AuthMethod;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of authentication methods: GET /auth-method.
 */
class GetAuthMethodsRequest extends ListRequest
{
    protected ?string $dto = AuthMethod::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/auth-method';
    }
}
