<?php

namespace spkm\ClearPass\Data\PolicyElements;

use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

/**
 * A Service record.
 */
readonly class Service extends Data
{
    protected const LISTS = ['acct_proxy_attrs_to_add' => AttributesToAdd::class, 'acct_proxy_attrs_to_delete' => AttributesToDelete::class, 'radius_proxy_attrs_to_delete' => AttributesToDelete::class, 'rules_conditions' => ServiceRules::class];

    /**
     * @param  Collection<int, AttributesToAdd>|null  $acct_proxy_attrs_to_add
     * @param  Collection<int, AttributesToDelete>|null  $acct_proxy_attrs_to_delete
     * @param  array<int, string>|null  $acct_proxy_targets
     * @param  array<int, string>|null  $auth_methods
     * @param  array<int, string>|null  $auth_sources
     * @param  array<int, string>|null  $authz_sources
     * @param  array<int, string>|null  $posture_policies
     * @param  array<int, string>|null  $profiler_endpoint_classification
     * @param  Collection<int, AttributesToDelete>|null  $radius_proxy_attrs_to_delete
     * @param  array<int, string>|null  $radius_proxy_targets
     * @param  Collection<int, ServiceRules>|null  $rules_conditions
     */
    public function __construct(
        /** Unique ID of the Service. */
        public ?int $id = null,
        /** Name of the Service. */
        public ?string $name = null,
        /** Type of the Service. */
        public ?string $type = null,
        /** Template of the Service. One of: Aruba 802.1X Wireless, 802.1X Wireless, 802.1X Wired, MAC Authentication, Web-based Authentication, Web-based Health Check Only, Web-based Open Network Access, 802.1X Wireless - Identity Only, 802.1X Wired - Identity Only, RADIUS Enforcement ( Generic ), RADIUS Proxy, RADIUS Authorization, TACACS+ Enforcement, Aruba Application Authentication, Aruba Application Authorization, Cisco Web Authentication Proxy, Event-based Enforcement, ClearPass OnConnect Enforcement. */
        public ?string $template = null,
        /** Order number of the Service. */
        public ?int $order_no = null,
        /** Is Service enabled?. */
        public ?bool $enabled = null,
        /** Service Hit Count. */
        public ?int $hit_count = null,
        /** Enforcement Policy Name. */
        public ?string $enf_policy = null,
        /** RADIUS attributes to be added for Accounting proxy. A collection of AttributesToAdd. */
        public ?Collection $acct_proxy_attrs_to_add = null,
        /** RADIUS attributes to be deleted for Accounting proxy. A collection of AttributesToDelete. */
        public ?Collection $acct_proxy_attrs_to_delete = null,
        /** Enable Accounting Proxy Targets. */
        public ?bool $acct_proxy_enabled = null,
        /** List Accounting Proxy Target names. */
        public ?array $acct_proxy_targets = null,
        /** Action after audit. One of: NONE, SNMP, RADIUS. */
        public ?string $action_after_audit = null,
        /** RADIUS CoA Action to be triggered after audit. */
        public ?string $audit_coa_acton = null,
        /** Enable Audit End-hosts. */
        public ?bool $audit_enabled = null,
        /** Client Type For MAC authentication request Audit Trigger Condition. One of: KNOWN, UNKNOWN, BOTH. */
        public ?string $audit_mac_auth_client_type = null,
        /** Audit Server Name. */
        public ?string $audit_server = null,
        /** Audit Trigger Conditions. One of: ALWAYS, NO_POSTURE, MAC_AUTH. */
        public ?string $audit_trigger_condition = null,
        /** List of Authentication Method Names. */
        public ?array $auth_methods = null,
        /** List of Authentication Source Names. */
        public ?array $auth_sources = null,
        /** List of Additional authorization sources from which to fetch role-mapping attributes. */
        public ?array $authz_sources = null,
        /** Default Posture Token. One of: HEALTHY, CHECKUP, TRANSITION, QUARANTINE, INFECTED, UNKNOWN. */
        public ?string $default_posture_token = null,
        /** Description of the Service. */
        public ?string $description = null,
        /** Enable to monitor network access without enforcement. */
        public ?bool $monitor_mode = null,
        /** Enable Posture Compliance. */
        public ?bool $posture_enabled = null,
        /** List of Posture Policy Names. */
        public ?array $posture_policies = null,
        /** RADIUS CoA Action to be triggered by Profiler. */
        public ?string $profiler_coa_action = null,
        /** Enable Profile Endpoints. */
        public ?bool $profiler_enabled = null,
        /** List of Endpoint classification(s) after which an action must be triggered. */
        public ?array $profiler_endpoint_classification = null,
        /** RADIUS attributes to be removed from remote server (proxy target) reply. A collection of AttributesToDelete. */
        public ?Collection $radius_proxy_attrs_to_delete = null,
        /** Enable proxy for accounting requests (Applicable only for RADIUS Proxy Service Type). */
        public ?bool $radius_proxy_enable_for_acct = null,
        /** Proxying Scheme for RADIUS Proxy Service Type. One of: Load Balance, Failover. */
        public ?string $radius_proxy_scheme = null,
        /** List of Proxy Targets for RADIUS Proxy Service Type. */
        public ?array $radius_proxy_targets = null,
        /** Enable auto-remediation of non-compliant end-hosts. */
        public ?bool $remediate_end_hosts = null,
        /** Remediation URL. */
        public ?string $remediation_url = null,
        /** Role Mapping Policy Name. */
        public ?string $role_mapping_policy = null,
        /** List of service rules conditions. A collection of ServiceRules. */
        public ?Collection $rules_conditions = null,
        /** Matches ANY/ALL of the rule conditions. One of: MATCHES_ANY, MATCHES_ALL. */
        public ?string $rules_match_type = null,
        /** Subject DN of Service Certificate. */
        public ?string $service_cert_cn = null,
        /** Expiry Date of Service Certificate (Date Format - MMM dd, yyyy HH:mm:ss Z). */
        public ?string $service_cert_expiry_date = null,
        /** Enable to specify a comma-separated list of rules to strip username prefixes or suffixes. */
        public ?bool $strip_username = null,
        /** Strip Username Rule. */
        public ?string $strip_username_csv = null,
        /** Enable to use cached Roles and Posture attributes from previous sessions. */
        public ?bool $use_cached_policy_results = null,
    ) {}
}
