<?php

namespace spkm\ClearPass\Data\Integrations;

use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

/**
 * A ExtensionInstance record.
 */
readonly class ExtensionInstance extends Data
{
    protected const LISTS = ['extension_hrefs' => ExtensionInstanceHref::class, 'network_ports' => ExtensionInstanceNetworkPort::class];

    /**
     * @param  Collection<int, ExtensionInstanceHref>|null  $extension_hrefs
     * @param  array<string, mixed>|null  $file_descriptions
     * @param  array<string, mixed>|null  $files
     * @param  Collection<int, ExtensionInstanceNetworkPort>|null  $network_ports
     */
    public function __construct(
        /** URL for the extension’s documentation. */
        public ?string $about_href = null,
        /** Description of the extension. */
        public ?string $description = null,
        /** List of URLs provided by the extension. A collection of ExtensionInstanceHref. */
        public ?Collection $extension_hrefs = null,
        /** Contains a description of each extension file ID. */
        public ?array $file_descriptions = null,
        /** Map of extension file IDs to local content items, with ‘public:’ or ‘private:’ prefix. */
        public ?array $files = null,
        /** Indicates that the extension has configuration settings. */
        public ?bool $has_config = null,
        /** Hostname assigned to the extension. */
        public ?string $hostname = null,
        /** URL for the extension’s icon. */
        public ?string $icon_href = null,
        /** ID of the extension instance. */
        public ?string $id = null,
        /** Time at which the extension was installed. */
        public ?string $install_time = null,
        /** Internal IP address of the extension. */
        public ?string $internal_ip_address = null,
        /** Name of the extension. */
        public ?string $name = null,
        /** Indicates that the extension is out-of-date and should be reinstalled. */
        public ?bool $needs_reinstall = null,
        /** List of network ports provided by the extension. A collection of ExtensionInstanceNetworkPort. */
        public ?Collection $network_ports = null,
        /** State details for any background reinstall operation that is in progress. */
        public ?string $reinstall_details = null,
        /** Current state of the extension. One of: preparing, downloading, stopped, running, failed. */
        public ?string $state = null,
        /** Additional information about the current state of the extension. */
        public ?string $state_details = null,
        /** ID of the extension in the store. */
        public ?string $store_id = null,
        /** Version number of the extension. */
        public ?string $version = null,
    ) {}
}
