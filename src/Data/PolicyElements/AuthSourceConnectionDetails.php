<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A AuthSourceConnectionDetails record.
 */
readonly class AuthSourceConnectionDetails extends Data
{
    /**
     * @param  array<int, string>|null  $static_host_lists
     */
    public function __construct(
        /** Boolean to always use NetBIOS name instead of the domain part in username for authentication. */
        public ?bool $always_use_netBIOS_name = null,
        /** Authorization Token of Authentication Source. */
        public ?string $authorization_token = null,
        /** Base DN of Authentication Source. */
        public ?string $base_DN = null,
        /** Base URL of Authentication Source. */
        public ?string $base_URL = null,
        /** Bind DN of Authentication Source. */
        public ?string $bind_DN = null,
        /** Bind Password of Authentication Source. */
        public ?string $bind_password = null,
        /** Allow bind using user password. */
        public ?bool $bind_user = null,
        /** Client Certificates id. */
        public ?string $client_certificate = null,
        /** Client ID of Authentication Source. */
        public ?string $client_id = null,
        /** Client Secret of Authentication Source. */
        public ?string $client_secret = null,
        /** Connection port of Authentication Source. */
        public ?int $connection_port = null,
        /** Connection Security of Authentication Source. One of: None, StartTLS, AD_Over_SSL. */
        public ?string $connection_security = null,
        /** Name of the database. */
        public ?string $database_name = null,
        /** Host Name of Authentication Source. */
        public ?string $host_name = null,
        /** Follow referrals for Authentication Source. */
        public ?bool $ldap_referrals = null,
        /** Password to login to SQL Server. */
        public ?string $login_password = null,
        /** User name to login to the Server. */
        public ?string $login_user_name = null,
        /** Net-BIOS-Domain-Name of Authentication Source. */
        public ?string $net_BIOS_domain_name = null,
        /** ODBC Type of SQL DB. One of: PostgreSQL, Oracle_11g, MariaDB, MSSQL. */
        public ?string $odbc_type = null,
        /** Password Attribute of Authentication Source. */
        public ?string $password_attribute = null,
        /** Password Header of Authentication Source. */
        public ?string $password_header = null,
        /** Type of the Password. One of: ClearText, NT_Hash, LM_Hash, SHA1, SHA256, SHA512, MD5, SHA1_Base64, SHA256_Base64, SHA512_Base64. */
        public ?string $password_type = null,
        /** Port of SQL Server. */
        public ?int $port = null,
        /** Protocol of Authentication Source. */
        public ?string $protocol = null,
        /** Realm of Authentication Source. */
        public ?string $realm = null,
        /** Enable special character handling for LDAP query. */
        public ?bool $replace_special_char = null,
        /** Search Scope of Authentication Source. One of: Base_Object_Search, One_Level_Search, SubTree_Search. */
        public ?string $search_scope = null,
        /** Secret key of Authentication Source. */
        public ?string $secret = null,
        /** Server Name of Authentication Source. */
        public ?string $server_name = null,
        /** Server Principal of Authentication Source. */
        public ?string $server_principal = null,
        /** Server Principal Password of Authentication Source. */
        public ?string $server_principal_password = null,
        /** Static Host Lists of Authentication Source. */
        public ?array $static_host_lists = null,
        /** Boolean to send status-server messages. */
        public ?string $status_server_messages = null,
        /** Tenant ID of Authentication Source. */
        public ?string $tenant_id = null,
        /** Timeout of the Connection. */
        public ?int $timeout = null,
        /** Trusted certificate ID used during verification of server certificate. */
        public ?int $trusted_certificate_id = null,
        /** User Certificate of Authentication Source. */
        public ?string $user_certificate = null,
        /** Boolean to verify Server Certificate for secure connection. */
        public ?bool $verify_server_certificate = null,
    ) {}
}
