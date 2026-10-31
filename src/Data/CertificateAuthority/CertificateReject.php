<?php

namespace spkm\ClearPass\Data\CertificateAuthority;

use spkm\ClearPass\Data\Data;

/**
 * A CertificateReject record.
 */
readonly class CertificateReject extends Data
{
    public function __construct(
        /** Select this checkbox to confirm the rejection of this request. */
        public ?bool $confirm_reject = null,
    ) {}
}
