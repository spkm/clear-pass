<?php

namespace spkm\ClearPass\Resources\PolicyElements;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\PolicyElements\PosturePolicy;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Requests\PolicyElements\PosturePolicy\CreatePosturePolicyRequest;
use spkm\ClearPass\Requests\PolicyElements\PosturePolicy\DeletePosturePolicyByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\PosturePolicy\DeletePosturePolicyRequest;
use spkm\ClearPass\Requests\PolicyElements\PosturePolicy\GetPosturePoliciesRequest;
use spkm\ClearPass\Requests\PolicyElements\PosturePolicy\GetPosturePolicyByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\PosturePolicy\GetPosturePolicyRequest;
use spkm\ClearPass\Requests\PolicyElements\PosturePolicy\ReplacePosturePolicyByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\PosturePolicy\ReplacePosturePolicyRequest;
use spkm\ClearPass\Requests\PolicyElements\PosturePolicy\UpdatePosturePolicyByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\PosturePolicy\UpdatePosturePolicyRequest;

/**
 * Manage Posture Policies, from ClearPass::policyElements()->posturePolicies().
 *
 * @extends Builder<PosturePolicy>
 */
class PosturePolicyResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, PosturePolicy::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetPosturePoliciesRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreatePosturePolicyRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetPosturePolicyRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdatePosturePolicyRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplacePosturePolicyRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeletePosturePolicyRequest((int) $id, $options);
    }

    /**
     * Get a Posture Policy by name: GET /posture-policy/name/{name}.
     */
    public function findByName(string $name): ?PosturePolicy
    {
        return $this->fetchOrNull(new GetPosturePolicyByNameRequest($name));
    }

    /**
     * Update a Posture Policy by name: PATCH /posture-policy/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?PosturePolicy
    {
        return $this->fetch(new UpdatePosturePolicyByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a Posture Policy by name: PUT /posture-policy/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?PosturePolicy
    {
        return $this->fetch(new ReplacePosturePolicyByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a Posture Policy by name: DELETE /posture-policy/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeletePosturePolicyByNameRequest($name, $options));

        return true;
    }
}
