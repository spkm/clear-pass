<?php

namespace spkm\ClearPass\Resources\PolicyElements;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\PolicyElements\TACACSServiceDictionary;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Requests\PolicyElements\TACACSServiceDictionary\CreateTACACSServiceDictionaryRequest;
use spkm\ClearPass\Requests\PolicyElements\TACACSServiceDictionary\DeleteTACACSServiceDictionaryByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\TACACSServiceDictionary\DeleteTACACSServiceDictionaryRequest;
use spkm\ClearPass\Requests\PolicyElements\TACACSServiceDictionary\GetTACACSServiceDictionariesRequest;
use spkm\ClearPass\Requests\PolicyElements\TACACSServiceDictionary\GetTACACSServiceDictionaryByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\TACACSServiceDictionary\GetTACACSServiceDictionaryRequest;
use spkm\ClearPass\Requests\PolicyElements\TACACSServiceDictionary\ReplaceTACACSServiceDictionaryByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\TACACSServiceDictionary\ReplaceTACACSServiceDictionaryRequest;
use spkm\ClearPass\Requests\PolicyElements\TACACSServiceDictionary\UpdateTACACSServiceDictionaryByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\TACACSServiceDictionary\UpdateTACACSServiceDictionaryRequest;

/**
 * Manage TACACS+ Service Dictionaries, from ClearPass::policyElements()->tacacsServiceDictionaries().
 *
 * @extends Builder<TACACSServiceDictionary>
 */
class TACACSServiceDictionaryResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, TACACSServiceDictionary::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetTACACSServiceDictionariesRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateTACACSServiceDictionaryRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetTACACSServiceDictionaryRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateTACACSServiceDictionaryRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceTACACSServiceDictionaryRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteTACACSServiceDictionaryRequest((int) $id, $options);
    }

    /**
     * Get a TACACS+ Service Dictionary by name: GET /tacacs-service-dictionary/name/{name}.
     */
    public function findByName(string $name): ?TACACSServiceDictionary
    {
        return $this->fetchOrNull(new GetTACACSServiceDictionaryByNameRequest($name));
    }

    /**
     * Update a TACACS+ Service Dictionary by name: PATCH /tacacs-service-dictionary/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?TACACSServiceDictionary
    {
        return $this->fetch(new UpdateTACACSServiceDictionaryByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a TACACS+ Service Dictionary by name: PUT /tacacs-service-dictionary/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?TACACSServiceDictionary
    {
        return $this->fetch(new ReplaceTACACSServiceDictionaryByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a TACACS+ Service Dictionary by name: DELETE /tacacs-service-dictionary/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteTACACSServiceDictionaryByNameRequest($name, $options));

        return true;
    }
}
