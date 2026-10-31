<?php

namespace spkm\ClearPass\Resources\PolicyElements;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\PolicyElements\RADIUSDictionary;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSDictionary\CreateRADIUSDictionaryRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSDictionary\DisableRADIUSDictionaryByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSDictionary\DisableRADIUSDictionaryRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSDictionary\EnableRADIUSDictionaryByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSDictionary\EnableRADIUSDictionaryRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSDictionary\GetRADIUSDictionariesRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSDictionary\GetRADIUSDictionaryByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSDictionary\GetRADIUSDictionaryRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSDictionary\ReplaceRADIUSDictionaryByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSDictionary\ReplaceRADIUSDictionaryRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSDictionary\UpdateRADIUSDictionaryByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSDictionary\UpdateRADIUSDictionaryRequest;

/**
 * Manage RADIUS Dictionaries, from ClearPass::policyElements()->radiusDictionaries().
 *
 * @extends Builder<RADIUSDictionary>
 */
class RADIUSDictionaryResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, RADIUSDictionary::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetRADIUSDictionariesRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateRADIUSDictionaryRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetRADIUSDictionaryRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateRADIUSDictionaryRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceRADIUSDictionaryRequest((int) $id, $body, $options);
    }

    /**
     * Get a RADIUS Dictionary by name: GET /radius-dictionary/name/{name}.
     */
    public function findByName(string $name): ?RADIUSDictionary
    {
        return $this->fetchOrNull(new GetRADIUSDictionaryByNameRequest($name));
    }

    /**
     * Update a RADIUS Dictionary by name: PATCH /radius-dictionary/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?RADIUSDictionary
    {
        return $this->fetch(new UpdateRADIUSDictionaryByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a RADIUS Dictionary by name: PUT /radius-dictionary/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?RADIUSDictionary
    {
        return $this->fetch(new ReplaceRADIUSDictionaryByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Enable a RADIUS Dictionary: PATCH /radius-dictionary/{radius_dictionary_id}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enable(int $radiusDictionaryId, array $options = []): ?RADIUSDictionary
    {
        return $this->fetch(new EnableRADIUSDictionaryRequest($radiusDictionaryId, $options));
    }

    /**
     * Disable a RADIUS Dictionary: PATCH /radius-dictionary/{radius_dictionary_id}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disable(int $radiusDictionaryId, array $options = []): ?RADIUSDictionary
    {
        return $this->fetch(new DisableRADIUSDictionaryRequest($radiusDictionaryId, $options));
    }

    /**
     * Enable a RADIUS Dictionary by name: PATCH /radius-dictionary/name/{name}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enableByName(string $name, array $options = []): ?RADIUSDictionary
    {
        return $this->fetch(new EnableRADIUSDictionaryByNameRequest($name, $options));
    }

    /**
     * Disable a RADIUS Dictionary by name: PATCH /radius-dictionary/name/{name}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disableByName(string $name, array $options = []): ?RADIUSDictionary
    {
        return $this->fetch(new DisableRADIUSDictionaryByNameRequest($name, $options));
    }
}
