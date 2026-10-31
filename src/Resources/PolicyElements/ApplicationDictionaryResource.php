<?php

namespace spkm\ClearPass\Resources\PolicyElements;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\PolicyElements\ApplicationDictionary;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Requests\PolicyElements\ApplicationDictionary\CreateApplicationDictionaryRequest;
use spkm\ClearPass\Requests\PolicyElements\ApplicationDictionary\DeleteApplicationDictionaryByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\ApplicationDictionary\DeleteApplicationDictionaryRequest;
use spkm\ClearPass\Requests\PolicyElements\ApplicationDictionary\GetApplicationDictionariesRequest;
use spkm\ClearPass\Requests\PolicyElements\ApplicationDictionary\GetApplicationDictionaryByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\ApplicationDictionary\GetApplicationDictionaryRequest;
use spkm\ClearPass\Requests\PolicyElements\ApplicationDictionary\ReplaceApplicationDictionaryByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\ApplicationDictionary\ReplaceApplicationDictionaryRequest;
use spkm\ClearPass\Requests\PolicyElements\ApplicationDictionary\UpdateApplicationDictionaryByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\ApplicationDictionary\UpdateApplicationDictionaryRequest;

/**
 * Manage Application Dictionaries, from ClearPass::policyElements()->applicationDictionaries().
 *
 * @extends Builder<ApplicationDictionary>
 */
class ApplicationDictionaryResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, ApplicationDictionary::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetApplicationDictionariesRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateApplicationDictionaryRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetApplicationDictionaryRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateApplicationDictionaryRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceApplicationDictionaryRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteApplicationDictionaryRequest((int) $id, $options);
    }

    /**
     * Get an Application Dictionary by name: GET /application-dictionary/name/{name}.
     */
    public function findByName(string $name): ?ApplicationDictionary
    {
        return $this->fetchOrNull(new GetApplicationDictionaryByNameRequest($name));
    }

    /**
     * Update an Application Dictionary by name: PATCH /application-dictionary/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?ApplicationDictionary
    {
        return $this->fetch(new UpdateApplicationDictionaryByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace an Application Dictionary by name: PUT /application-dictionary/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?ApplicationDictionary
    {
        return $this->fetch(new ReplaceApplicationDictionaryByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete an Application Dictionary by name: DELETE /application-dictionary/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteApplicationDictionaryByNameRequest($name, $options));

        return true;
    }
}
