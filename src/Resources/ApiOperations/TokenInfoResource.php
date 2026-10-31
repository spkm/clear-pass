<?php

namespace spkm\ClearPass\Resources\ApiOperations;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\ApiOperations\TokenInfo;
use spkm\ClearPass\Requests\ApiOperations\TokenInfo\CreateTokenInfoRequest;
use spkm\ClearPass\Requests\ApiOperations\TokenInfo\GetTokenInfoRequest;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Resources\SingletonResource;

/**
 * Returns OAuth2 authenticated client or user information, from ClearPass::apiOperations()->tokenInfo().
 *
 * @extends SingletonResource<TokenInfo>
 */
class TokenInfoResource extends SingletonResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, TokenInfo::class);
    }

    protected function getRequest(array $options): ClearPassRequest
    {
        return new GetTokenInfoRequest;
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateTokenInfoRequest($body, $options);
    }
}
