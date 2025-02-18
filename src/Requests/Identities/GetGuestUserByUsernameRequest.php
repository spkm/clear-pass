<?php

namespace spkm\ClearPass\Requests\Identities;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use spkm\ciphr\Traits\CiphrPaginationDefaults;

class GetGuestUserByUsernameRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected string $username, protected array $queryParameters = []){}

    public function resolveEndpoint(): string
    {
        return "/guest/username/{$this->username}";
    }

    public function defaultQuery(): array
    {
        return $this->queryParameters;
    }
}
