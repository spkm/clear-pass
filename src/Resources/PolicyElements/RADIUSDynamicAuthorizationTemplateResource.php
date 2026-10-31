<?php

namespace spkm\ClearPass\Resources\PolicyElements;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\PolicyElements\RADIUSDynamicAuthorizationTemplate;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSDynamicAuthorizationTemplate\CreateRADIUSDynamicAuthorizationTemplateRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSDynamicAuthorizationTemplate\DeleteRADIUSDynamicAuthorizationTemplateByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSDynamicAuthorizationTemplate\DeleteRADIUSDynamicAuthorizationTemplateRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSDynamicAuthorizationTemplate\GetRADIUSDynamicAuthorizationTemplateByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSDynamicAuthorizationTemplate\GetRADIUSDynamicAuthorizationTemplateRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSDynamicAuthorizationTemplate\GetRADIUSDynamicAuthorizationTemplatesRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSDynamicAuthorizationTemplate\ReplaceRADIUSDynamicAuthorizationTemplateByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSDynamicAuthorizationTemplate\ReplaceRADIUSDynamicAuthorizationTemplateRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSDynamicAuthorizationTemplate\UpdateRADIUSDynamicAuthorizationTemplateByNameRequest;
use spkm\ClearPass\Requests\PolicyElements\RADIUSDynamicAuthorizationTemplate\UpdateRADIUSDynamicAuthorizationTemplateRequest;

/**
 * Manage RADIUS Dynamic Authorization Templates, from ClearPass::policyElements()->radiusDynamicAuthorizationTemplates().
 *
 * @extends Builder<RADIUSDynamicAuthorizationTemplate>
 */
class RADIUSDynamicAuthorizationTemplateResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, RADIUSDynamicAuthorizationTemplate::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetRADIUSDynamicAuthorizationTemplatesRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateRADIUSDynamicAuthorizationTemplateRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetRADIUSDynamicAuthorizationTemplateRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateRADIUSDynamicAuthorizationTemplateRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceRADIUSDynamicAuthorizationTemplateRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteRADIUSDynamicAuthorizationTemplateRequest((int) $id, $options);
    }

    /**
     * Get a RADIUS Dynamic Authorization Template by name: GET /radius-dynamic-authorization-template/name/{name}.
     */
    public function findByName(string $name): ?RADIUSDynamicAuthorizationTemplate
    {
        return $this->fetchOrNull(new GetRADIUSDynamicAuthorizationTemplateByNameRequest($name));
    }

    /**
     * Update a RADIUS Dynamic Authorization Template by name: PATCH /radius-dynamic-authorization-template/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?RADIUSDynamicAuthorizationTemplate
    {
        return $this->fetch(new UpdateRADIUSDynamicAuthorizationTemplateByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a RADIUS Dynamic Authorization Template by name: PUT /radius-dynamic-authorization-template/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?RADIUSDynamicAuthorizationTemplate
    {
        return $this->fetch(new ReplaceRADIUSDynamicAuthorizationTemplateByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a RADIUS Dynamic Authorization Template by name: DELETE /radius-dynamic-authorization-template/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteRADIUSDynamicAuthorizationTemplateByNameRequest($name, $options));

        return true;
    }
}
