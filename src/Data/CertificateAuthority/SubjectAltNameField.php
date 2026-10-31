<?php

namespace spkm\ClearPass\Data\CertificateAuthority;

use spkm\ClearPass\Data\Data;

/**
 * A SubjectAltNameField record.
 */
readonly class SubjectAltNameField extends Data
{
    public function __construct(
        /** Field within the subject alt name. One of: DNS, email, IP, URI, userPrincipalName. */
        public ?string $field = null,
        /** Value of the field. */
        public ?string $value = null,
    ) {}
}
