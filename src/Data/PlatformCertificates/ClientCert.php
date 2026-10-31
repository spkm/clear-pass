<?php

namespace spkm\ClearPass\Data\PlatformCertificates;

use spkm\ClearPass\Data\Data;

/**
 * A ClientCert record.
 */
readonly class ClientCert extends Data
{
    /**
     * @param  array<string, mixed>|null  $root_ca_cert
     * @param  array<string, mixed>|null  $intermediate_ca_cert
     */
    public function __construct(
        /** Numeric ID of the client certificate. */
        public ?int $id = null,
        /** Subject of the client certificate. */
        public ?string $subject = null,
        /** Expiry date of the client certificate. */
        public ?string $expiry_date = null,
        /** Issue date of the client certificate. */
        public ?string $issue_date = null,
        /** Client certificate issued by. */
        public ?string $issue_by = null,
        /** Validity of the client certificate. */
        public ?string $validity = null,
        /** Root CA Certificate. */
        public ?array $root_ca_cert = null,
        /** Intermediate CA Certificate. */
        public ?array $intermediate_ca_cert = null,
        /** Certificate File. */
        public ?string $cert_file = null,
        /** Certificate File URL. */
        public ?string $certificate_url = null,
        /** PKCS12 File URL. */
        public ?string $pkcs12_file_url = null,
        /** PKCS12 passphrase. */
        public ?string $pkcs12_passphrase = null,
    ) {}
}
