<?php

namespace spkm\ClearPass\Requests\Identities;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use spkm\ClearPass\DTOs\GuestUser;
use spkm\ClearPass\Traits\TransformsGuestUser;

class DeleteGuestUserByUsernameRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected string $username, protected array $queryParameters = []){}

    public function resolveEndpoint(): string
    {
        return "/guest/{$this->username}";
    }

    public function defaultQuery(): array
    {
        return $this->queryParameters;
    }
}
