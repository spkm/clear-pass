<?php

namespace spkm\ClearPass\Data\ApiOperations;

use spkm\ClearPass\Data\Data;

/**
 * A OAuth2Response record.
 */
readonly class OAuth2Response extends Data
{
    public function __construct(
        /** Access token issued by the authorization server. */
        public ?string $access_token = null,
        /** Type of access token. Always set to "Bearer". */
        public ?string $token_type = null,
        /** The lifetime in seconds of the access token. */
        public ?int $expires_in = null,
        /** Refresh token, if enabled for this API client. Can be used to obtain a new access token. */
        public ?string $refresh_token = null,
        /** Scope of the access token. */
        public ?string $scope = null,
    ) {}
}
