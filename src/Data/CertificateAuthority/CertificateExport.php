<?php

namespace spkm\ClearPass\Data\CertificateAuthority;

use spkm\ClearPass\Data\Data;

/**
 * A CertificateExport record.
 */
readonly class CertificateExport extends Data
{
    public function __construct(
        /** Select the file format for the exported item. One of: p7b, pem, crt, txt, p12. */
        public ?string $export_format = null,
        /** Passphrase to protect the PKCS#12 file. */
        public ?string $export_password = null,
        /** Re-enter the passphrase. */
        public ?string $export_password2 = null,
        /** Select which certificate authorities to include. One of: all, intermediate. */
        public ?string $include_ca = null,
        /** Select this option to include the certificates for the CA and any intermediate certificate authorities. */
        public ?bool $include_chain = null,
    ) {}
}
