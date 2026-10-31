<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use spkm\ClearPass\Data\Data;

/**
 * A AosAttributes record.
 */
readonly class AosAttributes extends Data
{
    /**
     * @param  array<int, string>|null  $allowed_net_destinations
     */
    public function __construct(
        /** Add an IP Interface in the Redirection URL. */
        public ?string $add_ip_interface_in_redirection_url = null,
        /** Adding Switch IP Address in Redirection URL. One of: Yes, No. */
        public ?string $add_switch_ip_add_in_redirection_url = null,
        /** Add User VLAN in Redirection URL. One of: Yes, No. */
        public ?string $add_user_vlan_in_redirection_url = null,
        /** Allow only one Active User Session. One of: Yes, No. */
        public ?string $allow_one_active_user_session = null,
        /** Allowlist Net Destinations. */
        public ?array $allowed_net_destinations = null,
        /** Default Guest Role. */
        public ?string $default_guest_role = null,
        /** Default Role. */
        public ?string $default_role = null,
        /** Guest Login. One of: Yes, No. */
        public ?string $guest_login = null,
        /** Login Page. */
        public ?string $login_page = null,
        /** Logon Wait CPU Utilization Threshold (1-100 %). */
        public ?int $logon_wait_cpu_util_threshold = null,
        /** Logon Wait Maximum Delay (1-10 sec). */
        public ?int $logon_wait_max_delay = null,
        /** Logon Wait Minimum Delay (1-10 sec). */
        public ?int $logon_wait_min_delay = null,
        /** Logout Popup Window. One of: Yes, No. */
        public ?string $logout_popup_window = null,
        /** Max Authentication Failures (0-10). */
        public ?int $max_auth_failures = null,
        /** Redirect Pause (0-60 sec). */
        public ?int $redirect_pause = null,
        /** Server Group. */
        public ?string $server_group = null,
        /** Show the Acceptable Use Policy Page. One of: Yes, No. */
        public ?string $show_acceptable_use_policy_page = null,
        /** Show FQDN. One of: Yes, No. */
        public ?string $show_fqdn = null,
        /** Show Welcome Page. One of: Yes, No. */
        public ?string $show_welcome_page = null,
        /** Use CHAP (Non-standard). One of: Yes, No. */
        public ?string $use_chap = null,
        /** Use HTTP for Authentication. One of: Yes, No. */
        public ?string $use_http_for_auth = null,
        /** User Login. One of: Yes, No. */
        public ?string $user_login = null,
        /** Welcome Page. */
        public ?string $welcome_page = null,
    ) {}
}
