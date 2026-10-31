<?php

namespace spkm\ClearPass\Data\GuestConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A GuestAuthenticationConfiguration record.
 */
readonly class GuestAuthenticationConfiguration extends Data
{
    public function __construct(
        /** Controls the RADIUS authentication type used for internal RADIUS authentication requests. One of: pap, chap, mschap. */
        public ?string $g_radius_internal_auth_type = null,
        /** Global to automatically send disconnects when enabled/role values change. Requires a NAS Type supporting RFC-3576. */
        public ?bool $change_of_authorization = null,
        /** If checked, HTTP access by guests will be redirected to use HTTPS instead. */
        public ?bool $g_admin_access_guest_require_https = null,
        /** Select the default type for network access servers. One of: other, rfc3576, coa_3576, appauth_3576, appauthz_3576, aerohive_3576, alu_3576, alu, arista_3576, arista_nr_3576, aruba_3576, aruba, bluesocket, chillispot_3576, cisco_3576, cisco, colubris, consentry, enterasys, dell_3576, dell, extreme, extricom, fortinet_3576, fortinet, hpe_3576, hpe_msm_3576, hpe_uww_3576, juniper, meraki, meraki_splash, meru, motorola_3576, ruckus_3576, ruckus, saml, saml_authorize_only, saml_via, trapeze_3576, trendnet, xirrus. */
        public ?string $g_radius_default_vendor = null,
        /** Force a specific bind address for RFC-3576 requests. This may be needed in an AirGroup environment. Defaults to '0.0.0.0' or '::' depending on your network. */
        public ?string $g_radius_server_bind_3576 = null,
    ) {}
}
