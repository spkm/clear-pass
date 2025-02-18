<?php

namespace spkm\ClearPass\Requests\PolicyElements;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetRoleByNameRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected string $name, protected array $queryParameters = []) {}

    public function resolveEndpoint(): string
    {
        return "/role/name/{$this->name}";
    }

    public function defaultQuery(): array
    {
        return $this->queryParameters;
    }
}
