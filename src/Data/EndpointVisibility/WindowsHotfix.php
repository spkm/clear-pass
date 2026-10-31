<?php

namespace spkm\ClearPass\Data\EndpointVisibility;

use spkm\ClearPass\Data\Data;

/**
 * A WindowsHotfix record.
 */
readonly class WindowsHotfix extends Data
{
    public function __construct(
        /** Numeric id of the windows hotfix. */
        public ?int $id = null,
        /** KBID of the windows hotfix. */
        public ?string $kbid = null,
        /** OS of the windows hotfix. One of: Windows 10, Windows 11, Windows 7, Windows 8, Windows Server 2008, Windows Server 2012, Windows Server 2016, Windows Server 2019, Windows Server 2022. */
        public ?string $operating_system = null,
        /** Title of the windows hotfix. */
        public ?string $title = null,
        /** Severity rating of the windows hotfix. One of: Critical, Important, Low, Moderate, Unspecified. */
        public ?string $severity_rating = null,
        /** Description of the windows hotfix. */
        public ?string $description = null,
        /** Reboot Behavior of the windows hotfix. One of: , AlwaysRequiresReboot, CanRequestReboot, NeverReboots. */
        public ?string $reboot_behavior = null,
        /** Release Date of the windows hotfix. */
        public ?string $release_date = null,
        /** Superseded_by of the windows hotfix. */
        public ?string $superseded_by = null,
        /** Superseding of the windows hotfix. */
        public ?string $superseding = null,
        /** URL of the windows hotfix. */
        public ?string $url = null,
    ) {}
}
