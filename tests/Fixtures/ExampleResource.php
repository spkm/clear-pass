<?php

namespace spkm\ClearPass\Tests\Fixtures;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * @extends Builder<ExampleData>
 */
class ExampleResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, ExampleData::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new ExampleListRequest($query);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new ExampleItemRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new ExampleCreateRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ExampleUpdateRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ExampleReplaceRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new ExampleDeleteRequest((int) $id, $options);
    }

    public function findByName(string $name): ?ExampleData
    {
        return $this->fetchOrNull(new ExampleByNameRequest($name));
    }

    /**
     * @param  array<string, mixed>  $options
     */
    public function enable(int $id, array $options = []): ?ExampleData
    {
        return $this->fetch(new ExampleEnableRequest($id, $options));
    }
}
