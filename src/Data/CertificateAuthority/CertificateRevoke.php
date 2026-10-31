<?php

namespace spkm\ClearPass\Data\CertificateAuthority;

use spkm\ClearPass\Data\Data;

/**
 * A CertificateRevoke record.
 */
readonly class CertificateRevoke extends Data
{
    public function __construct(
        /** Numeric ID of the certificate authority. One of: 1. */
        public ?int $ca_id = null,
        /** Select this checkbox to confirm the certificate revocation. */
        public ?bool $confirm_revoke = null,
    ) {}
}
