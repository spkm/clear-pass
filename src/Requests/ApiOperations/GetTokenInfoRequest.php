<?php

namespace spkm\ClearPass\Requests\ApiOperations;

use Saloon\Enums\Method;

/**
 * The first version's request for the token's client or user: GET (or POST) /oauth/me.
 *
 * @deprecated Use ApiOperations\TokenInfo\GetTokenInfoRequest (or ClearPass::apiOperations()->tokenInfo()->get()).
 */
class GetTokenInfoRequest extends TokenInfo\GetTokenInfoRequest
{
    public function __construct(Method $method = Method::GET)
    {
        $this->method = $method;
    }
}
