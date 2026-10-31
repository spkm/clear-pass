<?php

namespace spkm\ClearPass\Resources;

use Saloon\Enums\Method;
use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\AdhocBodyRequest;
use spkm\ClearPass\Requests\AdhocListRequest;
use spkm\ClearPass\Requests\AdhocRequest;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * A builder over a collection the package has no resource for, from ClearPass::from('/path'); its records are
 * arrays, found, created, updated, replaced and deleted at /path/{id}.
 *
 * @extends Builder<Data>
 */
class AdhocResource extends Builder
{
    public function __construct(ClearPassConnector $connector, protected string $path)
    {
        parent::__construct($connector, null);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new AdhocListRequest($this->path, $query);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new AdhocRequest(Method::GET, $this->item($id), shape: ClearPassRequest::ONE);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new AdhocBodyRequest(Method::POST, $this->path, $body, $options, ClearPassRequest::ONE);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new AdhocBodyRequest(Method::PATCH, $this->item($id), $body, $options, ClearPassRequest::ONE);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new AdhocBodyRequest(Method::PUT, $this->item($id), $body, $options, ClearPassRequest::ONE);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new AdhocRequest(Method::DELETE, $this->item($id), $options, ClearPassRequest::NONE);
    }

    private function item(int|string $id): string
    {
        return rtrim($this->path, '/').'/'.rawurlencode((string) $id);
    }
}
