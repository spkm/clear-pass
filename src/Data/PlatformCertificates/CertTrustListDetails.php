<?php

namespace spkm\ClearPass\Data\PlatformCertificates;

use spkm\ClearPass\Data\Data;

/**
 * A CertTrustListDetails record.
 */
readonly class CertTrustListDetails extends Data
{
    /**
     * @param  array<int, string>|null  $cert_usage
     */
    public function __construct(
        /** ID of the certificate trust list. */
        public ?int $id = null,
        /** Subject DN of the certificate trust list. */
        public ?string $subject_DN = null,
        /** Issuer DN of certificate trust list. */
        public ?string $issuer_DN = null,
        /** Issue Date of certificate trust list. */
        public ?string $issue_date = null,
        /** Expiry Date of certificate trust list. */
        public ?string $expiry_date = null,
        /** Enable certificate trust list. */
        public ?bool $enabled = null,
        /** Valid status of certificate trust list. */
        public ?string $valid = null,
        /** Signature algorithm of certificate trust list. */
        public ?string $signature_algorithm = null,
        /** public key format of certificate trust list. */
        public ?string $public_key_format = null,
        /** Serial number of certificate trust list. */
        public ?string $serial_number = null,
        /** Usage of the certificate. */
        public ?array $cert_usage = null,
    ) {}
}
