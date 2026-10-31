<?php

namespace spkm\ClearPass\Data\PlatformCertificates;

use spkm\ClearPass\Data\Data;

/**
 * A CertTrustList record.
 */
readonly class CertTrustList extends Data
{
    /**
     * @param  array<int, string>|null  $cert_usage
     */
    public function __construct(
        /** ID of the certificate trust list. */
        public ?int $id = null,
        /** Certificate trust list file. */
        public ?string $cert_file = null,
        /** Enable certificate trust list. */
        public ?bool $enabled = null,
        /** Usage of the certificate. One of: AD/LDAP Servers, Aruba Infrastructure, Aruba Services, Database, EAP, Endpoint Context Servers, RadSec, SAML, SMTP, EST, Others. */
        public ?array $cert_usage = null,
    ) {}
}
