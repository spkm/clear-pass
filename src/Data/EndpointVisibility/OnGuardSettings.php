<?php

namespace spkm\ClearPass\Data\EndpointVisibility;

use spkm\ClearPass\Data\Data;

/**
 * A OnGuardSettings record.
 */
readonly class OnGuardSettings extends Data
{
    /**
     * @param  array<string, mixed>|null  $custom_remediation
     * @param  array<string, mixed>|null  $agent_installers
     * @param  array<string, mixed>|null  $agent_web_installers
     */
    public function __construct(
        /** Install VIA component. */
        public ?bool $install_vpn_component = null,
        /** [wired, wireless, vpn, other]: Network interfaces Agent should monitor. */
        public ?string $interfaces = null,
        /** Mode of operation. One of: auth, health, both. */
        public ?string $mode = null,
        /** Agent action when an update is available. One of: DoNothing, NotifyOnly, DownloadOnly, AutoUpdate. */
        public ?string $upgrade_action = null,
        /** Customize webpage details for Agent Remediation UI. Input should be in JSON format. */
        public ?array $custom_remediation = null,
        /** [wired, wireless, vpn, other]: Network interfaces Native Dissolvable Agent should monitor. */
        public ?string $web_agent_interfaces = null,
        /** Agent version. This is read only field. */
        public ?string $version = null,
        /** Version of the OnGuard Agent Library. This is read-only field. */
        public ?string $agentLibraryVersion = null,
        /** Time when Agent Installers was last updated. This is read only field. */
        public ?string $installer_modified_time = null,
        /** Formatted Time when Agent Installers was last updated. This is read only field. */
        public ?string $installer_modified_time_formatted = null,
        /** Details about Agent installers. This is read-only field. */
        public ?array $agent_installers = null,
        /** Details about Native Dissolvable Agent installers. This is read only field. */
        public ?array $agent_web_installers = null,
        /** Authentication type. One of: cert, password. */
        public ?string $auth_type = null,
        /** Filter criteria used by OnGuard client to select certificates for authentication. */
        public ?string $cert_filter_criteria = null,
        /** Caption for password field. */
        public ?string $field_password_caption = null,
        /** Caption for username field. */
        public ?string $field_username_caption = null,
        /** IP Version for Server Communication (Native). One of: IPv4Only, IPv6Only, dualPreferIPv4, dualPreferIPv6. */
        public ?string $ip_version_native = null,
        /** IP Version for Server Communication (OnGuard). One of: IPv4Only, IPv6Only, dualPreferIPv4, dualPreferIPv6, dualBoth. */
        public ?string $ip_version_onguard = null,
    ) {}
}
