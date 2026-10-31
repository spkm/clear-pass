<?php

namespace spkm\ClearPass\Data\ToolsAndUtilities;

use spkm\ClearPass\Data\Data;

/**
 * A RandomMpskGenerator record.
 */
readonly class RandomMpskGenerator extends Data
{
    public function __construct(
        /** The desired length of the MPSK. */
        public ?int $random_mpsk_length = null,
        /** The random MPSK method. See the documentation for the allowed values. */
        public ?string $random_mpsk_method = null,
        /** The picture to be used for the ‘nwa_picture_password’ method. See the documentation for the valid syntax. */
        public ?string $random_mpsk_picture = null,
    ) {}
}
