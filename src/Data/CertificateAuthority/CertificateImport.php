<?php

namespace spkm\ClearPass\Data\CertificateAuthority;

use spkm\ClearPass\Data\Data;

/**
 * A CertificateImport record.
 */
readonly class CertificateImport extends Data
{
    public function __construct(
        /** Type of certificate to import. One of: trusted, ca, code-signing. */
        public ?string $type = null,
        /** Contents of certificate to import. */
        public ?string $certificate_file = null,
        /** Encoding used for 'certificate_file' parameter. One of: base64, text. */
        public ?string $certificate_file_encoding = null,
        /** Numeric ID of the certificate authority. One of: 1. */
        public ?int $ca_id = null,
        /** Contents of private key to import. */
        public ?string $key_file = null,
        /** Encoding used for 'key_file' parameter. One of: base64, text. */
        public ?string $key_file_encoding = null,
        /** Enter the passphrase that was used to encrypt the private key. If the private key is not encrypted, leave this field blank. */
        public ?string $key_passphrase = null,
    ) {}
}
