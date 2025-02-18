<?php

namespace spkm\ClearPass\Requests\PolicyElements;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use spkm\ciphr\Traits\CiphrPaginationDefaults;

class GetRoleRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected int $id, protected array $queryParameters = []){}

    public function resolveEndpoint(): string
    {
        return "/role/{$this->id}";
    }

    public function defaultQuery(): array
    {
        return $this->queryParameters;
    }
}
