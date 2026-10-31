<?php

namespace spkm\ClearPass\Data\GlobalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A ClusterWideParameter record.
 */
readonly class ClusterWideParameter extends Data
{
    protected const ALIASES = ['DisableTLS1_0' => 'DisableTLS1.0', 'DisableTLS1_1' => 'DisableTLS1.1', 'DisableTLS1_3' => 'DisableTLS1.3'];

    public function __construct(
        /** Admin Session Idle Timeout in minutes. */
        public ?int $AdminSessionIdleTimeout = null,
        /** Enable Admin UI TACACS+ Client IP set by X-Forwarded-For (XFF) header. One of: TRUE, FALSE. */
        public ?string $AdminUserLoginTacacsClientIpSetByHeaderXFF = null,
        /** Remote TACACS+ server for Admin logins. */
        public ?string $AdminUserLoginRemoteTacacsServerIP = null,
        /** Admin UI Login Remote TACACS+ Server Port. */
        public ?int $AdminUserLoginRemoteTacacsServerPort = null,
        /** Remote TACACS+ server shared secret. */
        public ?string $AdminUserLoginRemoteTacacsServerSecret = null,
        /** Alert Notification Timeout in hours. One of: 1, 2, 4, 6, 8, 12, 24, Disabled. */
        public ?string $AlertNotificationTimeout = null,
        /** Enable TACACS+ clients to communicate with ClearPass server over an unencrypted channel. One of: Enable, Disable. */
        public ?string $TacacsAllowUnencryptedCommunication = null,
        /** Old Audit Records cleanup interval in days. */
        public ?int $AuditRecordsCleanupInterval = null,
        /** Auto backup configuration options. One of: Off, Config, Config|SessionInfo, Config|Extensions, Config|SessionInfo|Extensions. */
        public ?string $AutoBackupConfigOptions = null,
        /** CLI Session Idle Timeout in minutes. */
        public ?int $CLISessionIdleTimeout = null,
        /** Cleanup interval for CSRs and private keys. */
        public ?int $CSRCleanupInterval = null,
        /** Mode of communication between cluster nodes. One of: ipv4, ipv6. */
        public ?string $ClusterCommunicationMode = null,
        /** Enable Common Criteria mode for the cluster. One of: TRUE, FALSE. */
        public ?string $CommonCriteriaMode = null,
        /** Console Session Idle Timeout in minutes. */
        public ?int $ConsoleSessionIdleTimeout = null,
        /** Enable Content Security Policy (CSP). One of: Enable, Disable. */
        public ?string $ContentSecurityPolicy = null,
        /** Endpoint Context Servers polling interval in minutes. */
        public ?int $ContextServerPollInterval = null,
        /** [00:00:00-23:59:59] Endpoint Context Servers polling start time. */
        public ?string $ContextServerPollStartTime = null,
        /** Database user "appexternal" password. */
        public ?string $DbAppexternalUserPassword = null,
        /** Designated Standby Publisher. */
        public ?string $DesignatedStandbyPublisher = null,
        /** Disable TLSv1.0 support, this field cannot be modified in FIPS mode. One of: None, Admin, Network, All. */
        public ?string $DisableTLS1_0 = null,
        /** Disable TLSv1.1 support, this field cannot be modified in FIPS mode. One of: None, Admin, Network, All. */
        public ?string $DisableTLS1_1 = null,
        /** Enable NTLMV1 for WMI scans. One of: TRUE, FALSE. */
        public ?string $EnableNTLMV1ForWmi = null,
        /** Enable Publisher Failover. One of: TRUE, FALSE. */
        public ?string $EnablePublisherFailover = null,
        /** Enable sharing information about the cluster to Telemetry server. One of: TRUE, FALSE. */
        public ?string $EnableTelemetry = null,
        /** Expired guest accounts cleanup interval in days. */
        public ?int $ExpiredGuestAccountsCleanupInterval = null,
        /** Free disk space threshold value in %. */
        public ?int $FreeDiskSpaceThreshold = null,
        /** Free memory threshold value in %. */
        public ?int $FreeMemoryThreshold = null,
        /** Enable ICMPv6 Filters. One of: Enable, Disable. */
        public ?string $ICMPv6Filters = null,
        /** Enable Ignore Conflict (Network Boot Agents). One of: TRUE, FALSE. */
        public ?string $IgnoreConflictNetworkBootAgents = null,
        /** Cleanup interval for information stored on the disk in days. */
        public ?int $InformationStoredCleanupInterval = null,
        /** Known endpoints cleanup interval in days. */
        public ?int $KnownEndpointsCleanupInterval = null,
        /** Login Banner Text. */
        public ?string $LoginBannerText = null,
        /** ClearPass Zone Cache Durability. One of: OFF, NORMAL, FULL. */
        public ?string $ClearPassZoneCache = null,
        /** Netflow reprofile interval in days. */
        public ?int $NetflowReprofileInterval = null,
        /** Alert Notification - Email Address. */
        public ?string $NotificationEmailAddress = null,
        /** Alert Notification - SMS Address. */
        public ?string $NotificationSmsAddress = null,
        /** Automatically check for available OnGuard Signature Updates. One of: TRUE, FALSE. */
        public ?string $OnGuardAutoUpdatesFlag = null,
        /** Enable Post-Auth v2 HTTP enforcement. One of: Enable, Disable. */
        public ?string $PostAuthV2HttpEnforcement = null,
        /** TACACS+ Password Prompt Text. */
        public ?string $PasswordPrompt = null,
        /** Policy result cache timeout in minutes. */
        public ?int $PolicyResultCacheTimeout = null,
        /** Enable Post-Auth v2. One of: Enable, Disable. */
        public ?string $PostAuthV2 = null,
        /** Process wired device information from IF-MAP interface. One of: TRUE, FALSE. */
        public ?string $ProcessWiredFromIfMap = null,
        /** Profiled Known endpoints cleanup option in days. One of: TRUE, FALSE. */
        public ?string $ProfiledKnownEndpointsCleanupOption = null,
        /** Profiled Unknown endpoints cleanup interval in days. */
        public ?int $ProfiledUnknownEndpointsCleanupInterval = null,
        /** Enable endpoint port scan using Nmap. One of: TRUE, FALSE. */
        public ?string $ProfilerNmapEnable = null,
        /** Enable Endpoint scan using WMI. One of: TRUE, FALSE. */
        public ?string $ProfilerPostureEnable = null,
        /** Profiler Scan TCP Ports. */
        public ?string $ProfilerScanPorts = null,
        /** Profiler subnet scan interval in hours. */
        public ?int $ProfilerSubnetScanInterval = null,
        /** Automatically check for available Profiling Updates. One of: TRUE, FALSE. */
        public ?string $ProfilingAutoUpdatesFlag = null,
        /** Allowed SSH Cipher Modes. */
        public ?string $SSHCipherMode = null,
        /** Cleanup interval for Session log details in the database in days. */
        public ?int $SessionLogsCleanupInterval = null,
        /** Automatically check for available Software Updates. One of: TRUE, FALSE. */
        public ?string $SoftwareAutoUpdatesFlag = null,
        /** One of: TRUE, FALSE. */
        public ?string $ExtensionsAutoUpgradesFlag = null,
        /** Failover Wait Time in minutes. */
        public ?int $StandbyFailoverWaitTime = null,
        /** Static IP endpoints cleanup option. One of: TRUE, FALSE. */
        public ?string $StaticIPEndpointsCleanupOption = null,
        /** Store Password Hash for MSCHAP authentication. One of: TRUE, FALSE. */
        public ?string $StorePasswordHash = null,
        /** Store Local User passwords using reversible encryption. One of: TRUE, FALSE. */
        public ?string $StoreReversibleLocalUserPasswords = null,
        /** Syslog Export Interval in seconds. */
        public ?int $SyslogBatchInterval = null,
        /** System Alert Level. One of: INFO, WARN, ERROR. */
        public ?string $SystemAlertLevel = null,
        /** Disable Change Password for TACACS+. One of: TRUE, FALSE. */
        public ?string $TacacsDisableChangePassword = null,
        /** TACACS+ Connection Idle Timeout in seconds. */
        public ?int $TacacsIdleTimeout = null,
        /** Unknown endpoints cleanup interval in days. */
        public ?int $UnknownEndpointsCleanupInterval = null,
        /** TACACS+ User Prompt Text. */
        public ?string $UserPrompt = null,
        /** Enable unauthenticated TACACS+ user request processing. One of: Enable, Disable. */
        public ?string $TacacsProcessUnauthenticatedRequest = null,
        /** Enable Concurrent Admin Login. One of: TRUE, FALSE. */
        public ?string $allowConcurrentLogin = null,
        public ?string $AdminUserLoginSecondaryRemoteTacacsServerIP = null,
        public ?int $AdminUserLoginSecondaryRemoteTacacsServerPort = null,
        public ?string $AdminUserLoginSecondaryRemoteTacacsServerSecret = null,
        public ?string $AdminUserLoginTertiaryRemoteTacacsServerIP = null,
        public ?int $AdminUserLoginTertiaryRemoteTacacsServerPort = null,
        public ?string $AdminUserLoginTertiaryRemoteTacacsServerSecret = null,
        /** One of: None, Admin. */
        public ?string $DisableTLS1_3 = null,
        /** Force Enable User Acknowledgement. One of: TRUE, FALSE. */
        public ?string $EnableUserAcknowledgement = null,
        /** One of: Enable, Disable. */
        public ?string $PostAuthUnsubscribeEndpoints = null,
        /** Conflict Detection Strict Mode. One of: high, medium, low. */
        public ?string $ProfilerConflictStrictMode = null,
        public ?int $StaleTLSsessioninDiskclenaup = null,
        /** One of: Internal, Internal+Disk. */
        public ?string $session_cache_type = null,
    ) {}
}
