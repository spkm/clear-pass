<?php

namespace spkm\ClearPass\Requests\PolicyElements;

/**
 * The first version's role list request: GET /role, 100 at a time with the count, as it sent.
 *
 * @deprecated Use PolicyElements\Role\GetRolesRequest (or ClearPass::policyElements()->roles()).
 */
class GetRolesRequest extends Role\GetRolesRequest
{
    /**
     * @param  array<string, mixed>  $queryParameters
     */
    public function __construct(array $queryParameters = [])
    {
        parent::__construct(array_merge(['offset' => 0, 'limit' => 100, 'calculate_count' => 'true'], $queryParameters));
    }
}
