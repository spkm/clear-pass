<?php

namespace spkm\ClearPass\Resources\EndpointVisibility;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\EndpointVisibility\OnGuardCustomScript;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardCustomScript\CreateOnGuardCustomScriptRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardCustomScript\DeleteOnGuardCustomScriptByNameRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardCustomScript\DeleteOnGuardCustomScriptRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardCustomScript\GetOnGuardCustomScriptByNameRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardCustomScript\GetOnGuardCustomScriptRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardCustomScript\GetOnGuardCustomScriptsRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardCustomScript\ReplaceOnGuardCustomScriptByNameRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardCustomScript\ReplaceOnGuardCustomScriptRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardCustomScript\UpdateOnGuardCustomScriptByNameRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardCustomScript\UpdateOnGuardCustomScriptRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage OnGuard Custom Scripts, from ClearPass::endpointVisibility()->onGuardCustomScripts().
 *
 * @extends Builder<OnGuardCustomScript>
 */
class OnGuardCustomScriptResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, OnGuardCustomScript::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetOnGuardCustomScriptsRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateOnGuardCustomScriptRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetOnGuardCustomScriptRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateOnGuardCustomScriptRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceOnGuardCustomScriptRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteOnGuardCustomScriptRequest((int) $id, $options);
    }

    /**
     * Get an OnGuard Custom Script by name: GET /onguard-custom-script/name/{name}.
     */
    public function findByName(string $name): ?OnGuardCustomScript
    {
        return $this->fetchOrNull(new GetOnGuardCustomScriptByNameRequest($name));
    }

    /**
     * Update some fields of an OnGuard Custom Script by name: PATCH /onguard-custom-script/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?OnGuardCustomScript
    {
        return $this->fetch(new UpdateOnGuardCustomScriptByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace an OnGuard Custom Script by name: PUT /onguard-custom-script/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?OnGuardCustomScript
    {
        return $this->fetch(new ReplaceOnGuardCustomScriptByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete an OnGuard Custom Script by name: DELETE /onguard-custom-script/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteOnGuardCustomScriptByNameRequest($name, $options));

        return true;
    }
}
