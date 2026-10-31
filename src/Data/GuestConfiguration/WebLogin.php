<?php

namespace spkm\ClearPass\Data\GuestConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A WebLogin record.
 */
readonly class WebLogin extends Data
{
    /**
     * @param  array<string, mixed>|null  $oauth_providers
     */
    public function __construct(
        /** Enter a name for this web login page. */
        public ?string $name = null,
        /** Select a predefined group of settings suitable for standard network configurations. */
        public ?string $vendor_preset = null,
        /** The URL of the NAS device’s login form. */
        public ?string $form_action = null,
        /** Choose the method to use when submitting the login form to the NAS. */
        public ?string $form_method = null,
        /** The name of the username field for the login form. This will be passed to the NAS device when the form is submitted. */
        public ?string $form_username = null,
        /** The name of the password field for the login form. This will be passed to the NAS device when the form is submitted. */
        public ?string $form_password = null,
        /** Choose the type of password encryption to use when submitting the login form. */
        public ?string $form_password_encryption = null,
        /** Select the response of the system to a request that is not permitted. */
        public ?string $access_if_denied = null,
        /** The time in seconds to delay while displaying the login message. */
        public ?float $login_delay = null,
        /** Choose the skin to use when this web login page is displayed. */
        public ?string $login_skin = null,
        /** Select how the username and password should be checked before proceeding to the NAS authentication. */
        public ?string $login_pre_auth_check = null,
        /** Enter the IP addresses and networks from which logins are permitted. */
        public ?string $access_allowlist = null,
        /** Enter the IP addresses and networks that are denied login access. */
        public ?string $access_denylist = null,
        /** The Apple Captive Network Assistant (CNA) is the pop-up browser shown when joining a network that has a captive portal. Note that this option may not work with all vendors, depending on how the captive portal is implemented. */
        public ?bool $bypass_cna = null,
        /** Enter an optional URL to send as the Venue Info URL for CAPPORT RFC-8908. https://www.rfc-editor.org/rfc/rfc8908.html. */
        public ?string $capport_venue_url = null,
        /** Choose whether other credentials must also be provided in addition to a certificate. */
        public ?string $certificate_auth = null,
        /** Choose whether the user should select a client certificate when authenticating. */
        public ?string $certificate_request = null,
        /** Enter the default URL to redirect clients. Please ensure you prepend "http://" for any external domain. */
        public ?string $default_url = null,
        /** If selected, the client’s default destination will be overridden regardless of its value. */
        public ?bool $default_url_override = null,
        /** Comments or descriptive text about the web login. */
        public ?string $description = null,
        /** In multi-controller deployments, it is often required to post credentials to different addresses made available as part of the original redirection. The address above will be used whenever the parameter is not available or fails the requirements below. */
        public ?bool $dynamic_address = null,
        /** Enter the IP addresses and networks from which dynamic addresses are permitted. */
        public ?string $dynamic_allowlist = null,
        /** Enter the IP addresses and networks from which dynamic addresses are denied. */
        public ?string $dynamic_denylist = null,
        /** Specify any additional field names and values to send to the NAS device as name=value pairs, one per line. */
        public ?string $form_extra = null,
        /** The form label for the password field. Leave blank to use the default (Password:). */
        public ?string $form_password_label = null,
        /** The form label for the username field. Leave blank to use the default (Username:). */
        public ?string $form_username_label = null,
        /** The suffix is automatically appended to the username before submitting the login form to the NAS. */
        public ?string $form_username_suffix = null,
        /** The redirection URL will be hashed using this shared secret. */
        public ?string $hash_secret = null,
        /** Select the level of checking to apply to URL parameters passed to the web login page. Use this option to detect when URL parameters have been modified by the user, for example their MAC address. */
        public ?string $hash_url = null,
        /** Unique ID of the web login. */
        public ?int $id = null,
        /** Select a CAPTCHA mode. */
        public ?string $login_captcha = null,
        /** If selected, you must supply your own HTML login form in the Header or Footer HTML areas. */
        public ?bool $login_custom_form = null,
        /** HTML template code displayed after the login form. */
        public ?string $login_footer = null,
        /** HTML template code displayed before the login form. */
        public ?string $login_header = null,
        /** HTML template code displayed while the login attempt is in progress. */
        public ?string $login_message = null,
        /** The text to display if the username and password lookup fails. Leave blank to use the default (Invalid username or password). */
        public ?string $login_pre_auth_error = null,
        /** The text to display if the terms are not accepted. Leave blank to use the default (In order to log in, you must accept the terms and conditions.). */
        public ?string $login_terms_error = null,
        /** The form label for the terms checkbox. Leave blank to use the default (Terms:). */
        public ?string $login_terms_label = null,
        /** Select the layout for the terms and conditions text. */
        public ?string $login_terms_layout = null,
        /** If checked, the user will be forced to accept a Terms and Conditions checkbox. */
        public ?bool $login_terms_require = null,
        /** HTML code containing your Terms and Conditions. Leave blank to use the default (I accept the terms of use). */
        public ?string $login_terms_text = null,
        /** The title to display on the web login page. Leave blank to use the default (Login). */
        public ?string $login_title = null,
        public ?string $mfa_duo_host = null,
        public ?string $mfa_duo_ikey = null,
        public ?string $mfa_duo_skey = null,
        public ?string $mfa_enabled = null,
        /** All options with credentials must pass the Pre-Auth Check whenever a new user authenticates a device. */
        public ?string $mfa_first = null,
        public ?string $mfa_fn_client_id = null,
        public ?string $mfa_fn_client_secret = null,
        /** If disabled, the user must scan the QR code. */
        public ?bool $mfa_fn_email = null,
        /** Enter the number of factors to require. */
        public ?string $mfa_fn_factors = null,
        /** HTML template code displayed after the provider’s vendor-specific authentication area. */
        public ?string $mfa_footer_html = null,
        /** HTML template code displayed before the provider’s vendor-specific authentication area. */
        public ?string $mfa_header_html = null,
        public ?string $mfa_iws_app = null,
        /** Enter the hostname of the ImageWare server. */
        public ?string $mfa_iws_hostname = null,
        public ?string $mfa_iws_tenant = null,
        /** Authentication Context class reference. Values as specified by ISO/IEC 29115 Clause 6. */
        public ?string $mfa_mc_acr_values = null,
        /** Plain text reference to interlock the consumption device and authorization device. */
        public ?string $mfa_mc_binding_message = null,
        public ?string $mfa_mc_client_id = null,
        public ?string $mfa_mc_client_secret = null,
        /** Message which will be displayed on the authorization device. */
        public ?string $mfa_mc_context = null,
        /** Provide the endpoint URL provided by Mobile Connect during configuration. */
        public ?string $mfa_mc_discovery_service_endpoint = null,
        /** User interface display for Authentication. */
        public ?string $mfa_mc_display = null,
        /** An indication to IDP on what ID to use for login. */
        public ?string $mfa_mc_login_hint = null,
        /** Maximum elapsed time in secs since last authenticaiton. */
        public ?int $mfa_mc_max_age = null,
        /** Value to specify to the Authorisation server about type of prompt. */
        public ?string $mfa_mc_prompt = null,
        /** Mobile Connect Redirect URL provided during configuration. */
        public ?string $mfa_mc_redirect_url = null,
        /** OAuth 2.0 scope value. Only mc_authn is supported for this release. */
        public ?string $mfa_mc_scope = null,
        public ?string $mfa_mc_version = null,
        /** Log debugging data. */
        public ?bool $oauth_debug = null,
        /** Enable logins with cloud identity / social network credentials. */
        public ?bool $oauth_enabled = null,
        /** Configuration for cloud identity authentication providers. */
        public ?array $oauth_providers = null,
        /** Select the agent options for client scanning. Native agents are available for Microsoft Windows and Apple OS X. All other OS will fall back to Java. */
        public ?string $onguard_agents = null,
        /** HTML template code displayed after the health check text. */
        public ?string $onguard_footer = null,
        /** HTML template code displayed before the health check text. */
        public ?string $onguard_header = null,
        /** If selected, the guest will be required to pass a health check prior to accessing the network. */
        public ?bool $onguard_healthcheck = null,
        /** Enter a page name for this web login. The web login will be accessible from “/guest/page_name.php”. */
        public ?string $page_name = null,
        /** If selected, the endpoint’s attributes will also be updated with other details from the user account. */
        public ?bool $register_policy_manager = null,
        /** Customize attributes stored with the endpoint. */
        public ?bool $register_policy_manager_adv = null,
        /** List of name|value pairs to pass along. user_field | Endpoint Attribute. */
        public ?string $register_policy_manager_attrs = null,
        /** Select a security option to apply to the web login process. */
        public ?string $require_https = null,
        /** The form label for the log in button. Leave blank to use the default (Log In). */
        public ?string $submit_label = null,
        /** Enter the shared secret between the NAS device and the web login form. */
        public ?string $uam_secret = null,
        /** The name of the destination field required by the NAS. */
        public ?string $url = null,
        /** Select the authentication requirement. Access Code requires a single code (username) to be entered. Anonymous allows a blank form requiring just the terms or a Log In button. A pre-existing account is required. Auto is similar to anonymous but the page is automatically submitted. Access Code and Anonymous require the account to have the Username Authentication field set. */
        public ?string $username_auth = null,
        /** The account to use for anonymous authentication. The password will be visible within the HTML. It is recommended to increase the account Session Limit to the number of guests you wish to support. */
        public ?string $username_auth_username = null,
        /** Enter the hostname (FQDN) of the vendor’s product here. When using Secure Login over HTTPS, this name should match the name of the HTTPS certificate installed on your device. */
        public ?string $vendor_ip = null,
        /** Select how the user’s network login will be handled. Server-initiated logins require the user’s MAC address to be available, usually from the captive portal redirection process. */
        public ?string $webauth = null,
    ) {}
}
