<?php

namespace spkm\ClearPass\Resources\PolicyElements;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\PolicyElements\AuthMethod;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Requests\PolicyElements\AuthMethod\CreateAuthMethodRequest;
use spkm\ClearPass\Requests\PolicyElements\AuthMethod\DeleteAuthMethodByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\AuthMethod\DeleteAuthMethodRequest;
use spkm\ClearPass\Requests\PolicyElements\AuthMethod\GetAuthMethodByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\AuthMethod\GetAuthMethodRequest;
use spkm\ClearPass\Requests\PolicyElements\AuthMethod\GetAuthMethodsRequest;
use spkm\ClearPass\Requests\PolicyElements\AuthMethod\ReplaceAuthMethodByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\AuthMethod\ReplaceAuthMethodRequest;
use spkm\ClearPass\Requests\PolicyElements\AuthMethod\UpdateAuthMethodByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\AuthMethod\UpdateAuthMethodRequest;

/**
 * Manage authentication methods, from ClearPass::policyElements()->authMethods().
 *
 * @extends Builder<AuthMethod>
 */
class AuthMethodResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, AuthMethod::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAuthMethodsRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateAuthMethodRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetAuthMethodRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateAuthMethodRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceAuthMethodRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteAuthMethodRequest((int) $id, $options);
    }

    /**
     * Get an authentication method by name: GET /auth-method/name/{name}.
     */
    public function findByName(string $name): ?AuthMethod
    {
        return $this->fetchOrNull(new GetAuthMethodByNameRequest($name));
    }

    /**
     * Update some fields of an authentication method by name: PATCH /auth-method/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?AuthMethod
    {
        return $this->fetch(new UpdateAuthMethodByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace an authentication method by name: PUT /auth-method/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?AuthMethod
    {
        return $this->fetch(new ReplaceAuthMethodByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete an authentication method by name: DELETE /auth-method/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteAuthMethodByNameRequest($name, $options));

        return true;
    }
}
