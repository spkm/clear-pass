<?php

namespace spkm\ClearPass\Requests\Identities;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class GetGuestUsersRequest extends Request implements Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(protected array $queryParameters = []) {}

    public function resolveEndpoint(): string
    {
        return '/guest';
    }

    public function defaultQuery(): array
    {
        return array_merge([
            'offset' => 0,
            'limit' => 100,
            'calculate_count' => true,
        ], $this->queryParameters);
    }
}
