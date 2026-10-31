<?php

namespace spkm\ClearPass\Resources\Integrations;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\Integrations\ContextServerAction;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\Integrations\ContextServerAction\CreateContextServerActionRequest;
use spkm\ClearPass\Requests\Integrations\ContextServerAction\DeleteContextServerActionByActionNameRequest;
use spkm\ClearPass\Requests\Integrations\ContextServerAction\DeleteContextServerActionRequest;
use spkm\ClearPass\Requests\Integrations\ContextServerAction\GetContextServerActionByActionNameRequest;
use spkm\ClearPass\Requests\Integrations\ContextServerAction\GetContextServerActionRequest;
use spkm\ClearPass\Requests\Integrations\ContextServerAction\GetContextServerActionsRequest;
use spkm\ClearPass\Requests\Integrations\ContextServerAction\ReplaceContextServerActionByActionNameRequest;
use spkm\ClearPass\Requests\Integrations\ContextServerAction\ReplaceContextServerActionRequest;
use spkm\ClearPass\Requests\Integrations\ContextServerAction\UpdateContextServerActionByActionNameRequest;
use spkm\ClearPass\Requests\Integrations\ContextServerAction\UpdateContextServerActionRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage Context Server Actions, from ClearPass::integrations()->contextServerActions().
 *
 * @extends Builder<ContextServerAction>
 */
class ContextServerActionResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, ContextServerAction::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetContextServerActionsRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateContextServerActionRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetContextServerActionRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateContextServerActionRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceContextServerActionRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteContextServerActionRequest((int) $id, $options);
    }

    /**
     * Get a Context Server Action by name: GET /context-server-action/{server_type}/action-name/{action_name}.
     */
    public function findByActionName(string $serverType, string $actionName): ?ContextServerAction
    {
        return $this->fetchOrNull(new GetContextServerActionByActionNameRequest($serverType, $actionName));
    }

    /**
     * Update some fields of a Context Server Action by name: PATCH /context-server-action/{server_type}/action-name/{action_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByActionName(string $serverType, string $actionName, array|Data $attributes = [], array $options = []): ?ContextServerAction
    {
        return $this->fetch(new UpdateContextServerActionByActionNameRequest($serverType, $actionName, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a Context Server Action by name: PUT /context-server-action/{server_type}/action-name/{action_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByActionName(string $serverType, string $actionName, array|Data $attributes = [], array $options = []): ?ContextServerAction
    {
        return $this->fetch(new ReplaceContextServerActionByActionNameRequest($serverType, $actionName, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a Context Server Action by name: DELETE /context-server-action/{server_type}/action-name/{action_name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByActionName(string $serverType, string $actionName, array $options = []): bool
    {
        $this->fetch(new DeleteContextServerActionByActionNameRequest($serverType, $actionName, $options));

        return true;
    }
}
