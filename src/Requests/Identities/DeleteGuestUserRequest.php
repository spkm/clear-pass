<?php

namespace spkm\ClearPass\Requests\Identities;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use spkm\ClearPass\DTOs\GuestUser;
use spkm\ClearPass\Traits\TransformsGuestUser;

class DeleteGuestUserRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected int $id, protected array $queryParameters = []){}

    public function resolveEndpoint(): string
    {
        return "/guest/{$this->id}";
    }

    public function defaultQuery(): array
    {
        return $this->queryParameters;
    }
}
