<?php

namespace spkm\ClearPass\Data\PlatformCertificates;

use spkm\ClearPass\Data\Data;

/**
 * A CertSignRequest record.
 */
readonly class CertSignRequest extends Data
{
    public function __construct(
        /** PEM encoded Certificate Signing Request. */
        public ?string $cert_sign_request = null,
        /** Digest Algorithm. One of: SHA-1, SHA-224, SHA-256, SHA-384, SHA-512. */
        public ?string $digest_algorithm = null,
        /** Private Key Password. */
        public ?string $private_key_password = null,
        /** null. One of: 2048-bit rsa, 3072-bit rsa, 4096-bit rsa, nist/secg curve over a 256 bit prime field, nist/secg curve over a 384 bit prime field, nist/secg curve over a 521 bit prime field. */
        public ?string $private_key_type = null,
        /** Country (C). */
        public ?string $subject_C = null,
        /** Common Name (CN). */
        public ?string $subject_CN = null,
        /** Location (L). */
        public ?string $subject_L = null,
        /** Organization (O). */
        public ?string $subject_O = null,
        /** Organizational Unit (OU). */
        public ?string $subject_OU = null,
        /** Subject Alternate Name (SAN). */
        public ?string $subject_SAN = null,
        /** State (ST). */
        public ?string $subject_ST = null,
    ) {}
}
