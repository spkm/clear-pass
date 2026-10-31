<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A AuthMethodDetails record.
 */
readonly class AuthMethodDetails extends Data
{
    public function __construct(
        /** Allow anonymous mode (requires no server certificate). */
        public ?bool $allow_anonymous_provisioning = null,
        /** Allow authenticated mode (requires server certificate). */
        public ?bool $allow_authenticated_provisioning = null,
        /** Fast Reconnect. */
        public ?bool $allow_fast_reconnect = null,
        /** Allow Unknown End-Hosts. */
        public ?bool $allow_unknown_clients = null,
        /** Require end-host certificate for provisioning. */
        public ?bool $auth_provisioning_require_client_cert = null,
        /** Authorization Required. */
        public ?bool $autz_required = null,
        /** Certificate Comparison. One of: none, dn, cn, san, cn_or_san, binary. */
        public ?string $certificate_comparison = null,
        /** Challenge. */
        public ?string $challenge = null,
        /** End-Host Authentication. */
        public ?bool $client_certificate_auth = null,
        /** Enable Aruba-SSO. One of: auto, sso. */
        public ?string $encryption_scheme = null,
        /** Cryptobinding. One of: none, optional, required. */
        public ?string $enforce_crypto_binding = null,
        /** Group. One of: 256-bit random ECP group, 384-bit random ECP group, 521-bit random ECP group, 192-bit random ECP group, 224-bit random ECP group. */
        public ?string $group_name = null,
        /** Machine PAC. */
        public ?bool $machine_pac_enable = null,
        /** Machine PAC Expire Time. */
        public ?int $machine_pac_lifetime = null,
        /** Machine PAC Expire Time Units. One of: hours, days, weeks, months, years. */
        public ?string $machine_pac_lifetime_units = null,
        /** Microsoft NAP Support. */
        public ?bool $nap_support_enable = null,
        /** Number of retries. */
        public ?bool $no_of_retries = null,
        /** Verify Certificate using OCSP. One of: none, optional, required. */
        public ?string $ocsp_enable = null,
        /** OCSP URL. */
        public ?string $ocsp_url = null,
        /** Override OCSP URL from Client. */
        public ?bool $override_cert_url = null,
        /** Password reset sends in. One of: Challenge, Reject. */
        public ?bool $pass_reset_flow = null,
        /** Posture PAC. */
        public ?bool $posture_pac_enable = null,
        /** Posture PAC Expire Time. */
        public ?int $posture_pac_lifetime = null,
        /** Posture PAC Expire Time Units. One of: hours, days, weeks, months, years. */
        public ?string $posture_pac_lifetime_units = null,
        /** Public Password. */
        public ?string $public_password = null,
        /** Public Username. */
        public ?string $public_username = null,
        /** Server Id. */
        public ?string $server_id = null,
        /** Session Resumption. */
        public ?bool $session_cache_enable = null,
        /** Session Timeout. */
        public ?int $session_timeout = null,
        /** Tunnel PAC Expire Time. */
        public ?int $tunnel_pac_lifetime = null,
        /** Tunnel PAC Expire Time Units. One of: hours, days, weeks, months, years. */
        public ?string $tunnel_pac_lifetime_units = null,
        /** Authorization PAC. */
        public ?bool $user_auth_pac_enable = null,
        /** Authorization PAC Expire Time. */
        public ?int $user_auth_pac_lifetime = null,
        /** Authorization PAC Expire Time Units. One of: hours, days, weeks, months, years. */
        public ?string $user_auth_pac_lifetime_units = null,
    ) {}
}
