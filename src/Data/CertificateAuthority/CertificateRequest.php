<?php

namespace spkm\ClearPass\Data\CertificateAuthority;

use spkm\ClearPass\Data\Data;

/**
 * A CertificateRequest record.
 */
readonly class CertificateRequest extends Data
{
    public function __construct(
        /** Select the certificate authority that will be used to sign this request. One of: 1. */
        public ?int $ca_id = null,
        /** Choose a digital certificate signing request to upload. This should be a PEM encoded PKCS#10 certificate request file. */
        public ?string $file_csr = null,
        /** Select the type of certificate to create from this signing request. One of: tls-client, trusted, ca, code-signing, https. */
        public ?string $cert_type = null,
        /** The number of days before the certificate will expire. */
        public ?string $days = null,
        /** Encoding used for 'file_csr' parameter. One of: base64, text. */
        public ?string $file_csr_encoding = null,
        /** To modify the subject of the certificate before signing, do not select this checkbox. */
        public ?bool $issue_cert = null,
    ) {}
}
