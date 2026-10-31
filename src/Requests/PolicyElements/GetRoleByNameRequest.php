<?php

namespace spkm\ClearPass\Requests\PolicyElements;

/**
 * The first version's request for a role by name.
 *
 * @deprecated Use PolicyElements\Role\GetRoleByNameRequest (or ClearPass::policyElements()->roles()->findByName($name)).
 */
class GetRoleByNameRequest extends Role\GetRoleByNameRequest
{
    /**
     * @param  array<string, mixed>  $queryParameters
     */
    public function __construct(string $name, protected array $queryParameters = [])
    {
        parent::__construct($name);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return $this->queryParameters;
    }
}
