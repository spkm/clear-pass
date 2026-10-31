<?php

namespace spkm\ClearPass\Data\EndpointVisibility;

use spkm\ClearPass\Data\Data;

/**
 * A OnGuardGlobalSettings record.
 */
readonly class OnGuardGlobalSettings extends Data
{
    public function __construct(
        /** Enable access over Remote Desktop Session. */
        public ?bool $AllowRemoteDesktopSession = null,
        /** Cache Credentials Interval(in days). */
        public ?int $CacheCredentialsForDays = null,
        /** Enable OnGuard requests load-balancing. */
        public ?bool $EnableClientLoadBalance = null,
        /** OnGuard Health Check Interval (in hours). One of: >=0. */
        public ?int $HealthCheckQuietPeriod = null,
        /** Enable to hide Logout button. */
        public ?bool $HideLogoutButton = null,
        /** Enable to install VPN component. */
        public ?bool $InstallVPNComponent = null,
        /** Keep-alive Interval (in seconds). One of: 30-600. */
        public ?int $KeepAliveIntervalSeconds = null,
        /** Delay to bounce after Logout (in minutes). */
        public ?int $LogoutBounceDelay = null,
        /** Run OnGuard As. One of: Agent, Service, BothServiceAndAgent. */
        public ?string $RunOnGuardAs = null,
        /** Server Certificate Validation. One of: Required, WarnAndProceed, Skip. */
        public ?string $ServerCertificateValidation = null,
        /** Server Communication Mode. One of: IP, HostName, FQDN. */
        public ?string $ServerCommunicationMode = null,
        /** Support Team Email Address. */
        public ?string $SupportEmailAddress = null,
        /** Use Current OS Language (Windows only). */
        public ?bool $UseCurrentOSLanguage = null,
        /** Enable to use Windows Single-Sign On. */
        public ?bool $UseWindowsCredentials = null,
        /** VPN Device Names (Windows). */
        public ?string $VPNDeviceNames = null,
        /** VPN Device Names (macOS). */
        public ?string $VPNDeviceNamesMacOS = null,
        /** [Deprecated] Allowed Subnets for Wired access. */
        public ?string $WiredAllowedSubnets = null,
        /** [Deprecated] Allowed Subnets for Wireless access. */
        public ?string $WirelessAllowedSubnets = null,
        /** VPN Device Names (Linux). */
        public ?string $VPNDeviceNamesLinux = null,
    ) {}
}
