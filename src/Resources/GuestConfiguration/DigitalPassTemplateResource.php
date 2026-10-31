<?php

namespace spkm\ClearPass\Resources\GuestConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\GuestConfiguration\DigitalPassTemplate;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\GuestConfiguration\DigitalPassTemplate\CreateDigitalPassTemplateRequest;
use spkm\ClearPass\Requests\GuestConfiguration\DigitalPassTemplate\DeleteDigitalPassTemplateRequest;
use spkm\ClearPass\Requests\GuestConfiguration\DigitalPassTemplate\GetDigitalPassTemplateRequest;
use spkm\ClearPass\Requests\GuestConfiguration\DigitalPassTemplate\GetDigitalPassTemplatesRequest;
use spkm\ClearPass\Requests\GuestConfiguration\DigitalPassTemplate\ReplaceDigitalPassTemplateRequest;
use spkm\ClearPass\Requests\GuestConfiguration\DigitalPassTemplate\UpdateDigitalPassTemplateRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage pass templates, from ClearPass::guestConfiguration()->digitalPassTemplates().
 *
 * @extends Builder<DigitalPassTemplate>
 */
class DigitalPassTemplateResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, DigitalPassTemplate::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetDigitalPassTemplatesRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateDigitalPassTemplateRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetDigitalPassTemplateRequest($id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateDigitalPassTemplateRequest($id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceDigitalPassTemplateRequest($id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteDigitalPassTemplateRequest($id, $options);
    }
}
