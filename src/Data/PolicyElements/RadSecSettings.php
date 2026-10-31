<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A RadSecSettings record.
 */
readonly class RadSecSettings extends Data
{
    public function __construct(
        /** Common Name Regular Expression String. */
        public ?string $cn_regex = null,
        /** Issuer CA Certificates Expiry Date. */
        public ?string $expiry_date = null,
        /** Subject Alternate Name Regular Expression String. */
        public ?string $san_regex = null,
        /** Serial Number of a Certificate. */
        public ?string $serial_number = null,
        /** Source Override IP indicates the actual Source IP Address. */
        public ?string $src_override_ip = null,
        /** Issuer CA Certificates Subject DN. */
        public ?string $subject_dn = null,
        /** Validating a Certificate, the valid inputs are NONE, CN, SAN or CN_OR_SAN. One of: NONE, CN_OR_SAN, RFC. */
        public ?string $validate_cert = null,
    ) {}
}
