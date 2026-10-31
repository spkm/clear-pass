<?php

namespace spkm\ClearPass\Resources\GlobalServerConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\GlobalServerConfiguration\DataFilter;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\DataFilter\CreateDataFilterRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\DataFilter\DeleteDataFilterByNameRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\DataFilter\DeleteDataFilterRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\DataFilter\GetDataFilterByNameRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\DataFilter\GetDataFilterRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\DataFilter\GetDataFiltersRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\DataFilter\ReplaceDataFilterByNameRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\DataFilter\ReplaceDataFilterRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\DataFilter\UpdateDataFilterByNameRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\DataFilter\UpdateDataFilterRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage data filters, from ClearPass::globalServerConfiguration()->dataFilters().
 *
 * @extends Builder<DataFilter>
 */
class DataFilterResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, DataFilter::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetDataFiltersRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateDataFilterRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetDataFilterRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateDataFilterRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceDataFilterRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteDataFilterRequest((int) $id, $options);
    }

    /**
     * Get a data filter by name: GET /data-filter/name/{name}.
     */
    public function findByName(string $name): ?DataFilter
    {
        return $this->fetchOrNull(new GetDataFilterByNameRequest($name));
    }

    /**
     * Update a data filter by name: PATCH /data-filter/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?DataFilter
    {
        return $this->fetch(new UpdateDataFilterByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a data filter by name: PUT /data-filter/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?DataFilter
    {
        return $this->fetch(new ReplaceDataFilterByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a data filter by name: DELETE /data-filter/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteDataFilterByNameRequest($name, $options));

        return true;
    }
}
