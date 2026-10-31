<?php

namespace spkm\ClearPass\Resources\Integrations;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\Integrations\EventSources;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\Integrations\EventSources\CreateEventSourceRequest;
use spkm\ClearPass\Requests\Integrations\EventSources\DeleteEventSourceByNameRequest;
use spkm\ClearPass\Requests\Integrations\EventSources\DeleteEventSourceRequest;
use spkm\ClearPass\Requests\Integrations\EventSources\GetEventSourceByNameRequest;
use spkm\ClearPass\Requests\Integrations\EventSources\GetEventSourceRequest;
use spkm\ClearPass\Requests\Integrations\EventSources\GetEventSourcesRequest;
use spkm\ClearPass\Requests\Integrations\EventSources\ReplaceEventSourceByNameRequest;
use spkm\ClearPass\Requests\Integrations\EventSources\ReplaceEventSourceRequest;
use spkm\ClearPass\Requests\Integrations\EventSources\UpdateEventSourceByNameRequest;
use spkm\ClearPass\Requests\Integrations\EventSources\UpdateEventSourceRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage event sources, from ClearPass::integrations()->eventSources().
 *
 * @extends Builder<EventSources>
 */
class EventSourcesResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, EventSources::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetEventSourcesRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateEventSourceRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetEventSourceRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateEventSourceRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceEventSourceRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteEventSourceRequest((int) $id, $options);
    }

    /**
     * Get an event source by name: GET /event-sources/name/{name}.
     */
    public function findByName(string $name): ?EventSources
    {
        return $this->fetchOrNull(new GetEventSourceByNameRequest($name));
    }

    /**
     * Update some fields of an event source by name: PATCH /event-sources/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?EventSources
    {
        return $this->fetch(new UpdateEventSourceByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace an event source by name: PUT /event-sources/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?EventSources
    {
        return $this->fetch(new ReplaceEventSourceByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete an event source by name: DELETE /event-sources/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteEventSourceByNameRequest($name, $options));

        return true;
    }
}
