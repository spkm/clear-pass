<?php

namespace spkm\ClearPass\Requests\Identities;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetGuestUserRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected int $id, protected array $queryParameters = []) {}

    public function resolveEndpoint(): string
    {
        return "/guest/{$this->id}";
    }

    public function defaultQuery(): array
    {
        return $this->queryParameters;
    }
}
