<?php

namespace spkm\ClearPass\Resources\EnforcementProfile;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\EnforcementProfile\Policy;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EnforcementProfile\Policy\CreatePolicyRequest;
use spkm\ClearPass\Requests\EnforcementProfile\Policy\DeletePolicyByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\Policy\DeletePolicyRequest;
use spkm\ClearPass\Requests\EnforcementProfile\Policy\GetPoliciesRequest;
use spkm\ClearPass\Requests\EnforcementProfile\Policy\GetPolicyByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\Policy\GetPolicyRequest;
use spkm\ClearPass\Requests\EnforcementProfile\Policy\ReplacePolicyByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\Policy\ReplacePolicyRequest;
use spkm\ClearPass\Requests\EnforcementProfile\Policy\UpdatePolicyByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\Policy\UpdatePolicyRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage Policy, from ClearPass::enforcementProfile()->policies().
 *
 * @extends Builder<Policy>
 */
class PolicyResource extends Builder
{
    public function __construct(ClearPassConnector $connector, protected string $productName)
    {
        parent::__construct($connector, Policy::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetPoliciesRequest($this->productName, $query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreatePolicyRequest($this->productName, $body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetPolicyRequest($this->productName, (int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdatePolicyRequest($this->productName, (int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplacePolicyRequest($this->productName, (int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeletePolicyRequest($this->productName, (int) $id, $options);
    }

    /**
     * Get a Policy by name: GET /enforcement-profile-dur/policy/{product_name}/name/{name}.
     */
    public function findByName(string $name): ?Policy
    {
        return $this->fetchOrNull(new GetPolicyByNameRequest($this->productName, $name));
    }

    /**
     * Update a Policy by name: PATCH /enforcement-profile-dur/policy/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?Policy
    {
        return $this->fetch(new UpdatePolicyByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a Policy by name: PUT /enforcement-profile-dur/policy/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?Policy
    {
        return $this->fetch(new ReplacePolicyByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a Policy by name: DELETE /enforcement-profile-dur/policy/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeletePolicyByNameRequest($this->productName, $name, $options));

        return true;
    }
}
