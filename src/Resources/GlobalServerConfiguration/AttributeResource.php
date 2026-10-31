<?php

namespace spkm\ClearPass\Resources\GlobalServerConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\GlobalServerConfiguration\Attribute;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\Attribute\CreateAttributeRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\Attribute\DeleteAttributeByNameRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\Attribute\DeleteAttributeRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\Attribute\GetAttributeByNameRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\Attribute\GetAttributeRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\Attribute\GetAttributesRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\Attribute\ReplaceAttributeByNameRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\Attribute\ReplaceAttributeRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\Attribute\UpdateAttributeByNameRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\Attribute\UpdateAttributeRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage Attributes, from ClearPass::globalServerConfiguration()->attributes().
 *
 * @extends Builder<Attribute>
 */
class AttributeResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, Attribute::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAttributesRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateAttributeRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetAttributeRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateAttributeRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceAttributeRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteAttributeRequest((int) $id, $options);
    }

    /**
     * Get an attribute by name: GET /attribute/{entity_name}/name/{name}.
     */
    public function findByName(string $entityName, string $name): ?Attribute
    {
        return $this->fetchOrNull(new GetAttributeByNameRequest($entityName, $name));
    }

    /**
     * Update some fields of an attribute by name: PATCH /attribute/{entity_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $entityName, string $name, array|Data $attributes = [], array $options = []): ?Attribute
    {
        return $this->fetch(new UpdateAttributeByNameRequest($entityName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace an attribute by name: PUT /attribute/{entity_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $entityName, string $name, array|Data $attributes = [], array $options = []): ?Attribute
    {
        return $this->fetch(new ReplaceAttributeByNameRequest($entityName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete an attribute by name: DELETE /attribute/{entity_name}/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $entityName, string $name, array $options = []): bool
    {
        $this->fetch(new DeleteAttributeByNameRequest($entityName, $name, $options));

        return true;
    }
}
