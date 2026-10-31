<?php

namespace spkm\ClearPass\Data\ApiOperations;

use spkm\ClearPass\Data\Data;

/**
 * A TokenEndpoint record.
 */
readonly class TokenEndpoint extends Data
{
    public function __construct(
        /** OAuth2 authentication method. One of: client_credentials, password, refresh_token. */
        public ?string $grant_type = null,
        /** Client ID defined in API Clients. */
        public ?string $client_id = null,
        /** Client secret, required if the API client is not a public client. */
        public ?string $client_secret = null,
        /** Password for authentication, required for grant_type "password". */
        public ?string $password = null,
        /** Refresh token issued to the client, required for grant_type "refresh_token". */
        public ?string $refresh_token = null,
        /** Scope of the access request. */
        public ?string $scope = null,
        /** Username for authentication, required for grant_type "password". */
        public ?string $username = null,
    ) {}
}
