<?php

namespace spkm\ClearPass\Data\LocalServerConfiguration;

use spkm\ClearPass\Data\Data;

/**
 * A CppmVersion record.
 */
readonly class CppmVersion extends Data
{
    public function __construct(
        /** App major version. */
        public ?int $app_major_version = null,
        /** App minor version. */
        public ?string $app_minor_version = null,
        /** App service release. */
        public ?string $app_service_release = null,
        /** App build number. */
        public ?string $app_build_number = null,
        /** Hardware version. */
        public ?string $hardware_version = null,
        /** is FIPS mode enabled. */
        public ?bool $fips_enabled = null,
        /** Is CC mode enabled?. */
        public ?bool $cc_enabled = null,
        /** is Evaluation license. */
        public ?bool $eval_license = null,
        /** is Cloud mode enabled. */
        public ?bool $cloud_mode = null,
    ) {}
}
