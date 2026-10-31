<?php

namespace spkm\ClearPass\Data\Integrations;

use spkm\ClearPass\Data\Data;

/**
 * A EndpointContextServer record.
 */
readonly class EndpointContextServer extends Data
{
    /**
     * @param  array<string, mixed>|null  $vendor_attrs
     */
    public function __construct(
        /** Numeric ID of the Context Server. */
        public ?int $id = null,
        /** Server Type. One of: Aruba Activate, VMware AirWatch, JAMF, MobileIron Core, IBM MaaS360, SAP Afaria, SOTI, Google Admin Console, Palo Alto Networks Panorama, Palo Alto Networks Firewall, Juniper Networks SRX, Citrix XenMobile, Generic HTTP Context Server, Aruba Airwave, Aruba Central, ClearPass Cloud Proxy, Aruba IntroSpect. */
        public ?string $server_type = null,
        /** Server Name. */
        public ?string $server_name = null,
        /** Server Base URL. */
        public ?string $server_base_url = null,
        /** Authentication Method of the Context Server. One of: basic, oauth2, cert, both. */
        public ?string $auth_method = null,
        /** Enable to validate the server certificate. */
        public ?bool $validate_server = null,
        /** Enable Server. */
        public ?bool $status = null,
        /** Enable to bypass proxy server. */
        public ?bool $bypass_proxy = null,
        /** Client Certificate CN. */
        public ?string $client_cert_CN = null,
        /** Client Certificate expiry date. */
        public ?string $client_cert_expiry_date = null,
        /** IP Version. One of: ipV4, ipV6, ipBoth. */
        public ?string $ip_version = null,
        /** Access token URL of OAuth2. */
        public ?string $oauth2_access_token_url = null,
        /** Client ID of OAuth2. */
        public ?string $oauth2_client_id = null,
        /** Client Secret of OAuth2. */
        public ?string $oauth2_client_secret = null,
        /** Password. */
        public ?string $password = null,
        /** Username. */
        public ?string $username = null,
        /** Attributes. */
        public ?array $vendor_attrs = null,
    ) {}
}
