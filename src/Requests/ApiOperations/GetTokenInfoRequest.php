<?php

namespace spkm\ClearPass\Requests\ApiOperations;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetTokenInfoRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(Method $method = Method::GET)
    {
        $this->method = $method;
    }

    public function resolveEndpoint(): string
    {
        return '/oauth/me';
    }
}
