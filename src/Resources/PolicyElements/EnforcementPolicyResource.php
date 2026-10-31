<?php

namespace spkm\ClearPass\Resources\PolicyElements;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\PolicyElements\EnforcementPolicy;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Requests\PolicyElements\EnforcementPolicy\CreateEnforcementPolicyRequest;
use spkm\ClearPass\Requests\PolicyElements\EnforcementPolicy\DeleteEnforcementPolicyByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\EnforcementPolicy\DeleteEnforcementPolicyRequest;
use spkm\ClearPass\Requests\PolicyElements\EnforcementPolicy\GetEnforcementPoliciesRequest;
use spkm\ClearPass\Requests\PolicyElements\EnforcementPolicy\GetEnforcementPolicyByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\EnforcementPolicy\GetEnforcementPolicyRequest;
use spkm\ClearPass\Requests\PolicyElements\EnforcementPolicy\ReplaceEnforcementPolicyByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\EnforcementPolicy\ReplaceEnforcementPolicyRequest;
use spkm\ClearPass\Requests\PolicyElements\EnforcementPolicy\UpdateEnforcementPolicyByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\EnforcementPolicy\UpdateEnforcementPolicyRequest;

/**
 * Manage Enforcement Policies, from ClearPass::policyElements()->enforcementPolicies().
 *
 * @extends Builder<EnforcementPolicy>
 */
class EnforcementPolicyResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, EnforcementPolicy::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetEnforcementPoliciesRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateEnforcementPolicyRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetEnforcementPolicyRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateEnforcementPolicyRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceEnforcementPolicyRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteEnforcementPolicyRequest((int) $id, $options);
    }

    /**
     * Get a enforcement policy by name: GET /enforcement-policy/name/{name}.
     */
    public function findByName(string $name): ?EnforcementPolicy
    {
        return $this->fetchOrNull(new GetEnforcementPolicyByNameRequest($name));
    }

    /**
     * Update a enforcement policy by name: PATCH /enforcement-policy/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?EnforcementPolicy
    {
        return $this->fetch(new UpdateEnforcementPolicyByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a enforcement policy by name: PUT /enforcement-policy/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?EnforcementPolicy
    {
        return $this->fetch(new ReplaceEnforcementPolicyByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a enforcement policy by name: DELETE /enforcement-policy/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteEnforcementPolicyByNameRequest($name, $options));

        return true;
    }
}
