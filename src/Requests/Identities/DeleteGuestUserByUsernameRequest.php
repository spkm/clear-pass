<?php

namespace spkm\ClearPass\Requests\Identities;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteGuestUserByUsernameRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected string $username, protected array $queryParameters = []) {}

    public function resolveEndpoint(): string
    {
        return "/guest/{$this->username}";
    }

    public function defaultQuery(): array
    {
        return $this->queryParameters;
    }
}
