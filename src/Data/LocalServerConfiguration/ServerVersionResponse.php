<?php

namespace spkm\ClearPass\Data\LocalServerConfiguration;

use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

/**
 * A ServerVersionResponse record.
 */
readonly class ServerVersionResponse extends Data
{
    protected const LISTS = ['installed_patches' => InstalledPatchInfo::class];

    /**
     * @param  Collection<int, InstalledPatchInfo>|null  $installed_patches
     */
    public function __construct(
        /** ClearPass Policy Manager version. */
        public ?string $cppm_version = null,
        /** ClearPass Guest version. */
        public ?string $guest_version = null,
        /** Patches that have been installed on this server. A collection of InstalledPatchInfo. */
        public ?Collection $installed_patches = null,
    ) {}
}
