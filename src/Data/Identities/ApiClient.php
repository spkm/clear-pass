<?php

namespace spkm\ClearPass\Data\Identities;

use spkm\ClearPass\Data\Data;

/**
 * A ApiClient record.
 */
readonly class ApiClient extends Data
{
    public function __construct(
        /** Specify the lifetime of an OAuth2 access token. */
        public ?string $access_token_lifetime = null,
        /** Specify the lifetime of an OAuth2 access token. */
        public ?string $access_token_lifetime_units = null,
        /** The unique string identifying this API client. Use this value in the OAuth2 “client_id” parameter. */
        public ?string $client_id = null,
        /** The unique string identifying this API client. Use this value in the OAuth2 “client_id” parameter. */
        public ?string $id = null,
        /** Specify the lifetime of an OAuth2 refresh token. */
        public ?string $refresh_token_lifetime = null,
        /** Specify the lifetime of an OAuth2 refresh token. */
        public ?string $refresh_token_lifetime_units = null,
        /** Lifetime of an OAuth2 access token. */
        public ?string $access_lifetime = null,
        /** Not supported at this time. */
        public ?int $auto_confirm = null,
        /** Use this field to store comments or notes about this API client. */
        public ?string $client_description = null,
        /** Public clients have no client secret. */
        public ?bool $client_public = null,
        /** An OAuth2 refresh token may be used to obtain an updated access token. Use grant_type=refresh_token for this. */
        public ?bool $client_refresh = null,
        /** Use this value in the OAuth2 “client_secret” parameter. NOTE: This value is encrypted when stored and cannot be retrieved. */
        public ?string $client_secret = null,
        /** Enable API client. */
        public ?bool $enabled = null,
        /** Only the selected authentication method will be permitted for use with this client ID. */
        public ?string $grant_types = null,
        /** The operator profile applies role-based access control to authorized OAuth2 clients. This determines what API objects and methods are available for use. */
        public ?int $profile_id = null,
        /** Name of operator profile. */
        public ?string $profile_name = null,
        /** Not supported at this time. */
        public ?string $redirect_uri = null,
        /** Lifetime of an OAuth2 refresh token. */
        public ?string $refresh_lifetime = null,
        /** Not supported at this time. */
        public ?string $scope = null,
        /** Not supported at this time. */
        public ?string $user_id = null,
    ) {}
}
