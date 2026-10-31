<?php

namespace spkm\ClearPass\Resources\GuestConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\GuestConfiguration\PrintTemplate;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\GuestConfiguration\PrintTemplate\CreatePrintTemplateRequest;
use spkm\ClearPass\Requests\GuestConfiguration\PrintTemplate\DeletePrintTemplateRequest;
use spkm\ClearPass\Requests\GuestConfiguration\PrintTemplate\GetPrintTemplateRequest;
use spkm\ClearPass\Requests\GuestConfiguration\PrintTemplate\GetPrintTemplatesRequest;
use spkm\ClearPass\Requests\GuestConfiguration\PrintTemplate\ReplacePrintTemplateRequest;
use spkm\ClearPass\Requests\GuestConfiguration\PrintTemplate\UpdatePrintTemplateRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage print templates, from ClearPass::guestConfiguration()->printTemplates().
 *
 * @extends Builder<PrintTemplate>
 */
class PrintTemplateResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, PrintTemplate::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetPrintTemplatesRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreatePrintTemplateRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetPrintTemplateRequest($id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdatePrintTemplateRequest($id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplacePrintTemplateRequest($id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeletePrintTemplateRequest($id, $options);
    }
}
