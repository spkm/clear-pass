<?php

namespace spkm\ClearPass\Data\PlatformCertificates;

use spkm\ClearPass\Data\Data;

/**
 * A ServerCert record.
 */
readonly class ServerCert extends Data
{
    /**
     * @param  array<string, mixed>|null  $root_ca_cert
     * @param  array<mixed>|null  $intermediate_ca_cert
     */
    public function __construct(
        /** Service ID of the server certificate(1-RADIUS server cert, 2-HTTPS(ECC) server cert, 7-HTTPS(RSA) server cert,21-RadSec server cert and 106-Database server cert). */
        public ?int $service_id = null,
        /** Service Name of the server certificate(RADIUS, HTTPS(ECC), HTTPS(RSA), RadSec or Database). */
        public ?string $service_name = null,
        /** Type of the server certificate. */
        public ?string $certificate_type = null,
        /** Subject of the server certificate. */
        public ?string $subject = null,
        /** Expiry date of the server certificate. */
        public ?string $expiry_date = null,
        /** Issue date of the server certificate. */
        public ?string $issue_date = null,
        /** server certificate issued by. */
        public ?string $issue_by = null,
        /** Validity of the server certificate. */
        public ?string $validity = null,
        /** Root CA Certificate. */
        public ?array $root_ca_cert = null,
        /** Intermediate CA Certificate. */
        public ?array $intermediate_ca_cert = null,
        /** Certificate File. */
        public ?string $cert_file = null,
        /** Certificate File URL. */
        public ?string $certificate_url = null,
        /** Enabled State of the certificate. */
        public ?bool $enabled = null,
        /** PKCS12 File URL. */
        public ?string $pkcs12_file_url = null,
        /** PKCS12 passphrase. */
        public ?string $pkcs12_passphrase = null,
        /** Public Key Algorithm of Certificate. */
        public ?string $public_key_algorithm = null,
    ) {}
}
