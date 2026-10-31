<?php

namespace spkm\ClearPass\Resources\ApiOperations;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\ApiOperations\OAuth2Response;
use spkm\ClearPass\Data\ApiOperations\TokenPrivileges;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Requests\ApiOperations\TokenEndpoint\ObtainTokenRequest;
use spkm\ClearPass\Requests\ApiOperations\TokenPrivileges\GetTokenPrivilegesRequest;
use spkm\ClearPass\Resources\BaseResource;

/**
 * The ApiOperations API: ClearPass::apiOperations().
 *
 * @extends BaseResource<Data>
 */
class ApiOperationsResources extends BaseResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Obtain an OAuth2 access token for making API calls: POST /oauth.
     *
     * @param  array<string, mixed>|Data  $body
     * @param  array<string, mixed>  $options
     */
    public function obtainToken(array|Data $body = [], array $options = []): ?OAuth2Response
    {
        return $this->fetch(new ObtainTokenRequest($this->payloadOf($body), $options));
    }

    /**
     * Returns OAuth2 authenticated client or user information.
     */
    public function tokenInfo(): TokenInfoResource
    {
        return new TokenInfoResource($this->connector);
    }

    /**
     * Returns a list of privileges available to the user: GET /oauth/privileges.
     */
    public function tokenPrivileges(): ?TokenPrivileges
    {
        return $this->fetch(new GetTokenPrivilegesRequest);
    }
}
