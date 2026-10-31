<?php

namespace spkm\ClearPass\Data\EndpointVisibility;

use spkm\ClearPass\Data\Data;

/**
 * A AgentlessOnGuardSettings record.
 */
readonly class AgentlessOnGuardSettings extends Data
{
    /**
     * @param  array<int, string>|null  $servers
     * @param  array<int, string>|null  $checksums_32
     * @param  array<int, string>|null  $checksums_64
     */
    public function __construct(
        /** Numeric ID of Agentless OnGuard Setting. */
        public ?int $id = null,
        /** Name of Agentless OnGuard Setting. */
        public ?string $name = null,
        /** Description of Agentless OnGuard Setting. */
        public ?string $description = null,
        /** Client OS type. Allowed Values: Windows, macOS and Linux. */
        public ?string $client_os = null,
        /** Full path of directory on endpoints where all files required to start Agentless OnGuard will be copied (e.g. C:\OnGuard). */
        public ?string $working_dir = null,
        /** Action to be performed on endpoints. One of: START_HEALTH_CHECKS. */
        public ?string $action = null,
        /** IP addresses or FQDN of ClearPass servers that Agentless OnGuard should use to read agent settings (e.g. ["hostname.example.com", "1.2.3.4"]). */
        public ?array $servers = null,
        /** HTTP/HTTPS URL to download Agentless OnGuardWrapper EXE from the Remote File Server (e.g. https://10.20.30.40/agent/AgentlessOnGuard/windows/AgentlessOnGuardWrapper.exe). */
        public ?string $download_url = null,
        /** Should Agentless OnGuard Launcher validate the Server Certificate of the remote server while downloading Agentless OnGuardWrapper EXE? (default=true). */
        public ?bool $validate_url_cert = null,
        /** Override checksum fields (default=false). */
        public ?bool $override_checksum = null,
        /** SHA256 checksums of 32-bit Agentless OnGuard Wrapper EXEs. */
        public ?array $checksums_32 = null,
        /** SHA256 checksums of 64-bit Agentless OnGuard Wrapper EXEs. */
        public ?array $checksums_64 = null,
        /** Name of domain account used to launch Agentless OnGuard on endpoints. */
        public ?string $domain_account = null,
        /** Name of ssh account used to launch Agentless OnGuard on endpoints. */
        public ?string $ssh_account = null,
    ) {}
}
