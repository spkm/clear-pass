<?php

namespace spkm\ClearPass\Data\ToolsAndUtilities;

use spkm\ClearPass\Data\Data;

/**
 * A RandomPasswordGenerator record.
 */
readonly class RandomPasswordGenerator extends Data
{
    public function __construct(
        /** The desired length of the password. */
        public ?int $random_password_length = null,
        /** The random password method. See the documentation for the allowed values. */
        public ?string $random_password_method = null,
        /** The picture to be used for the ‘nwa_picture_password’ method. See the documentation for the valid syntax. */
        public ?string $random_password_picture = null,
    ) {}
}
