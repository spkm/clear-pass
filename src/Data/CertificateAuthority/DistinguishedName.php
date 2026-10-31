<?php

namespace spkm\ClearPass\Data\CertificateAuthority;

use spkm\ClearPass\Data\Data;

/**
 * A DistinguishedName record.
 */
readonly class DistinguishedName extends Data
{
    public function __construct(
        /** ISO 3166 country code. */
        public ?string $C = null,
        /** Common name. */
        public ?string $CN = null,
        /** Locality name, e.g. city. */
        public ?string $L = null,
        /** Organization name. */
        public ?string $O = null,
        /** Organizational unit name. */
        public ?string $OU = null,
        /** State or province name. */
        public ?string $ST = null,
        /** Email address. */
        public ?string $emailAddress = null,
    ) {}
}
