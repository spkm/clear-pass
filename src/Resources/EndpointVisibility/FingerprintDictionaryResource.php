<?php

namespace spkm\ClearPass\Resources\EndpointVisibility;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\EndpointVisibility\FingerprintDictionary;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EndpointVisibility\FingerprintDictionary\CreateFingerprintDictionaryRequest;
use spkm\ClearPass\Requests\EndpointVisibility\FingerprintDictionary\DeleteFingerprintDictionaryByNameRequest;
use spkm\ClearPass\Requests\EndpointVisibility\FingerprintDictionary\DeleteFingerprintDictionaryRequest;
use spkm\ClearPass\Requests\EndpointVisibility\FingerprintDictionary\GetFingerprintDictionariesRequest;
use spkm\ClearPass\Requests\EndpointVisibility\FingerprintDictionary\GetFingerprintDictionaryByNameRequest;
use spkm\ClearPass\Requests\EndpointVisibility\FingerprintDictionary\GetFingerprintDictionaryRequest;
use spkm\ClearPass\Requests\EndpointVisibility\FingerprintDictionary\ReplaceFingerprintDictionaryByNameRequest;
use spkm\ClearPass\Requests\EndpointVisibility\FingerprintDictionary\ReplaceFingerprintDictionaryRequest;
use spkm\ClearPass\Requests\EndpointVisibility\FingerprintDictionary\UpdateFingerprintDictionaryByNameRequest;
use spkm\ClearPass\Requests\EndpointVisibility\FingerprintDictionary\UpdateFingerprintDictionaryRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage Fingerprints, from ClearPass::endpointVisibility()->fingerprintDictionaries().
 *
 * @extends Builder<FingerprintDictionary>
 */
class FingerprintDictionaryResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, FingerprintDictionary::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetFingerprintDictionariesRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateFingerprintDictionaryRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetFingerprintDictionaryRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateFingerprintDictionaryRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceFingerprintDictionaryRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteFingerprintDictionaryRequest((int) $id, $options);
    }

    /**
     * Get a Fingerprint by name: GET /fingerprint/name/{category}/{family}/{name}.
     */
    public function findByName(string $category, string $family, string $name): ?FingerprintDictionary
    {
        return $this->fetchOrNull(new GetFingerprintDictionaryByNameRequest($category, $family, $name));
    }

    /**
     * Update some fields of a Fingerprint by name: PATCH /fingerprint/name/{category}/{family}/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $category, string $family, string $name, array|Data $attributes = [], array $options = []): ?FingerprintDictionary
    {
        return $this->fetch(new UpdateFingerprintDictionaryByNameRequest($category, $family, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a Fingerprint by name: PUT /fingerprint/name/{category}/{family}/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $category, string $family, string $name, array|Data $attributes = [], array $options = []): ?FingerprintDictionary
    {
        return $this->fetch(new ReplaceFingerprintDictionaryByNameRequest($category, $family, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a Fingerprint by name: DELETE /fingerprint/name/{category}/{family}/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $category, string $family, string $name, array $options = []): bool
    {
        $this->fetch(new DeleteFingerprintDictionaryByNameRequest($category, $family, $name, $options));

        return true;
    }
}
