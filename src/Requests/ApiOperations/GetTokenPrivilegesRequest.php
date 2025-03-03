<?php

namespace spkm\ClearPass\Requests\ApiOperations;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetTokenPrivilegesRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/oauth/privileges';
    }
}
