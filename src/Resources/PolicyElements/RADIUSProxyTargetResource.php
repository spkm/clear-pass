<?php

namespace spkm\ClearPass\Resources\PolicyElements;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\PolicyElements\RADIUSProxyTarget;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSProxyTarget\CreateRADIUSProxyTargetRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSProxyTarget\DeleteRADIUSProxyTargetByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSProxyTarget\DeleteRADIUSProxyTargetRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSProxyTarget\GetRADIUSProxyTargetByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSProxyTarget\GetRADIUSProxyTargetRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSProxyTarget\GetRADIUSProxyTargetsRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSProxyTarget\ReplaceRADIUSProxyTargetByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSProxyTarget\ReplaceRADIUSProxyTargetRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSProxyTarget\UpdateRADIUSProxyTargetByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSProxyTarget\UpdateRADIUSProxyTargetRequest;

/**
 * Manage proxy targets, from ClearPass::policyElements()->radiusProxyTargets().
 *
 * @extends Builder<RADIUSProxyTarget>
 */
class RADIUSProxyTargetResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, RADIUSProxyTarget::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetRADIUSProxyTargetsRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateRADIUSProxyTargetRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetRADIUSProxyTargetRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateRADIUSProxyTargetRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceRADIUSProxyTargetRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteRADIUSProxyTargetRequest((int) $id, $options);
    }

    /**
     * Get a proxy target by name: GET /proxy-target/name/{name}.
     */
    public function findByName(string $name): ?RADIUSProxyTarget
    {
        return $this->fetchOrNull(new GetRADIUSProxyTargetByNameRequest($name));
    }

    /**
     * Update some fields of a proxy target by name: PATCH /proxy-target/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?RADIUSProxyTarget
    {
        return $this->fetch(new UpdateRADIUSProxyTargetByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a proxy target by name: PUT /proxy-target/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?RADIUSProxyTarget
    {
        return $this->fetch(new ReplaceRADIUSProxyTargetByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a proxy target by name: DELETE /proxy-target/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteRADIUSProxyTargetByNameRequest($name, $options));

        return true;
    }
}
