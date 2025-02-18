<?php

namespace spkm\ClearPass\Requests\Identities;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use spkm\ClearPass\DTOs\GuestUser;
use spkm\ClearPass\Traits\TransformsGuestUser;

class ReplaceGuestUserByUsernameRequest extends Request implements HasBody
{
    use HasJsonBody, TransformsGuestUser;

    protected Method $method = Method::PUT;

    public function __construct(protected GuestUser $guestUser, protected array $queryParameters = [])
    {
        if($this->guestUser->username === null){
            throw new \Exception('Guest User Username is required');
        }
    }

    public function resolveEndpoint(): string
    {
        return "/guest/username/{$this->guestUser->username}";
    }

    public function defaultQuery(): array
    {
        return $this->queryParameters;
    }

    public function defaultBody(): array
    {
        return $this->transformGuestUser();
    }
}
