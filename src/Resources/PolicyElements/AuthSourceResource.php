<?php

namespace spkm\ClearPass\Resources\PolicyElements;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\PolicyElements\AuthSource;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Requests\PolicyElements\AuthSource\CreateAuthSourceRequest;
use spkm\ClearPass\Requests\PolicyElements\AuthSource\DeleteAuthSourceByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\AuthSource\DeleteAuthSourceRequest;
use spkm\ClearPass\Requests\PolicyElements\AuthSource\GetAuthSourceByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\AuthSource\GetAuthSourceRequest;
use spkm\ClearPass\Requests\PolicyElements\AuthSource\GetAuthSourcesRequest;
use spkm\ClearPass\Requests\PolicyElements\AuthSource\ReplaceAuthSourceByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\AuthSource\ReplaceAuthSourceRequest;
use spkm\ClearPass\Requests\PolicyElements\AuthSource\UpdateAuthSourceByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\AuthSource\UpdateAuthSourceRequest;

/**
 * Manage authentication sources, from ClearPass::policyElements()->authSources().
 *
 * @extends Builder<AuthSource>
 */
class AuthSourceResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, AuthSource::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAuthSourcesRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateAuthSourceRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetAuthSourceRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateAuthSourceRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceAuthSourceRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteAuthSourceRequest((int) $id, $options);
    }

    /**
     * Get an authentication source by name: GET /auth-source/name/{name}.
     */
    public function findByName(string $name): ?AuthSource
    {
        return $this->fetchOrNull(new GetAuthSourceByNameRequest($name));
    }

    /**
     * Update some fields of an authentication source by name: PATCH /auth-source/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?AuthSource
    {
        return $this->fetch(new UpdateAuthSourceByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace an authentication source by name: PUT /auth-source/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?AuthSource
    {
        return $this->fetch(new ReplaceAuthSourceByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete an authentication source by name: DELETE /auth-source/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteAuthSourceByNameRequest($name, $options));

        return true;
    }
}
