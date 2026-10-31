<?php

namespace spkm\ClearPass\Requests\PolicyElements;

/**
 * The first version's request for a role by id.
 *
 * @deprecated Use PolicyElements\Role\GetRoleRequest (or ClearPass::policyElements()->roles()->find($id)).
 */
class GetRoleRequest extends Role\GetRoleRequest
{
    /**
     * @param  array<string, mixed>  $queryParameters
     */
    public function __construct(int $id, protected array $queryParameters = [])
    {
        parent::__construct($id);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return $this->queryParameters;
    }
}
