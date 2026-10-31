<?php

namespace spkm\ClearPass\Resources\Integrations;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\Integrations\IngressEventDictionary;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\Integrations\IngressEventDictionary\CreateIngressEventDictionaryRequest;
use spkm\ClearPass\Requests\Integrations\IngressEventDictionary\DeleteIngressEventDictionaryByFormatNameRequest;
use spkm\ClearPass\Requests\Integrations\IngressEventDictionary\DeleteIngressEventDictionaryRequest;
use spkm\ClearPass\Requests\Integrations\IngressEventDictionary\GetIngressEventDictionariesRequest;
use spkm\ClearPass\Requests\Integrations\IngressEventDictionary\GetIngressEventDictionaryByFormatNameRequest;
use spkm\ClearPass\Requests\Integrations\IngressEventDictionary\GetIngressEventDictionaryRequest;
use spkm\ClearPass\Requests\Integrations\IngressEventDictionary\ReplaceIngressEventDictionaryByFormatNameRequest;
use spkm\ClearPass\Requests\Integrations\IngressEventDictionary\ReplaceIngressEventDictionaryRequest;
use spkm\ClearPass\Requests\Integrations\IngressEventDictionary\UpdateIngressEventDictionaryByFormatNameRequest;
use spkm\ClearPass\Requests\Integrations\IngressEventDictionary\UpdateIngressEventDictionaryRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage Ingress Event Dictionaries, from ClearPass::integrations()->ingressEventDictionaries().
 *
 * @extends Builder<IngressEventDictionary>
 */
class IngressEventDictionaryResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, IngressEventDictionary::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetIngressEventDictionariesRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateIngressEventDictionaryRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetIngressEventDictionaryRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateIngressEventDictionaryRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceIngressEventDictionaryRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteIngressEventDictionaryRequest((int) $id, $options);
    }

    /**
     * Get an Ingress Event Dictionary by format_name: GET /ingress-event-dictionary/format_name/{format_name}.
     */
    public function findByFormatName(string $formatName): ?IngressEventDictionary
    {
        return $this->fetchOrNull(new GetIngressEventDictionaryByFormatNameRequest($formatName));
    }

    /**
     * Update an Ingress Event Dictionary by format_name: PATCH /ingress-event-dictionary/format_name/{format_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByFormatName(string $formatName, array|Data $attributes = [], array $options = []): ?IngressEventDictionary
    {
        return $this->fetch(new UpdateIngressEventDictionaryByFormatNameRequest($formatName, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace an Ingress Event Dictionary by format_name: PUT /ingress-event-dictionary/format_name/{format_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByFormatName(string $formatName, array|Data $attributes = [], array $options = []): ?IngressEventDictionary
    {
        return $this->fetch(new ReplaceIngressEventDictionaryByFormatNameRequest($formatName, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete an Ingress Event Dictionary by format_name: DELETE /ingress-event-dictionary/format_name/{format_name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByFormatName(string $formatName, array $options = []): bool
    {
        $this->fetch(new DeleteIngressEventDictionaryByFormatNameRequest($formatName, $options));

        return true;
    }
}
