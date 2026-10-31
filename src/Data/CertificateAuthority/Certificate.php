<?php

namespace spkm\ClearPass\Data\CertificateAuthority;

use Carbon\CarbonImmutable;
use spkm\ClearPass\Data\Data;

/**
 * A Certificate record.
 */
readonly class Certificate extends Data
{
    /**
     * @param  array<int, string>|null  $key_usage
     * @param  array<int, string>|null  $key_usage_extended
     * @param  array<int, string>|null  $mdps_mac_address
     */
    public function __construct(
        /** Time of the last check for expiration actions. */
        public ?CarbonImmutable $action_notification_sent_at = null,
        /** Numeric ID of the Onboard certificate authority; null if not an Onboard-issued certificate. */
        public ?int $ca_id = null,
        /** Name of the Onboard certificate authority; null if not an Onboard-issued certificate. */
        public ?string $ca_name = null,
        /** Text representation of the X509 certificate. */
        public ?string $certificate_pem = null,
        /** Subclassification of the type of certificate; may be null. One of: profile-signing. */
        public ?string $certificate_sub_type = null,
        /** Type of this certificate. One of: ca, scep-client, tls-client, trusted, code-signing, scep-server, https. */
        public ?string $certificate_type = null,
        /** Version number of the X509 certificate. */
        public ?int $certificate_version = null,
        /** Time at which the certificate signing request was rejected; may be null. */
        public ?CarbonImmutable $csr_rejected_at = null,
        /** SHA-1 fingerprint of the certificate. */
        public ?string $fingerprint_sha1 = null,
        /** SHA-256 fingerprint of the certificate. */
        public ?string $fingerprint_sha256 = null,
        /** True if certificate is present, or false for certificate signing requests. */
        public ?bool $has_certificate = null,
        /** True if server holds the private key for the certificate. */
        public ?bool $has_key = null,
        /** Numeric ID of the certificate. */
        public ?int $id = null,
        /** True if the certificate has not expired and has not been revoked. */
        public ?bool $is_valid = null,
        /** Path representation of certificate issuer’s distinguished name; components separated with forward slash (/). */
        public ?string $issuer = null,
        /** Common name of the certificate issuer. */
        public ?string $issuer_common_name = null,
        /** Country (C) of the certificate issuer. */
        public ?string $issuer_country = null,
        /** Name of the authority that issued this certificate. */
        public ?DistinguishedName $issuer_dn = null,
        /** Email address of the certificate issuer. */
        public ?string $issuer_email_address = null,
        /** Locality (L) of the certificate issuer. */
        public ?string $issuer_locality = null,
        /** Organization (O) of the certificate issuer. */
        public ?string $issuer_organization = null,
        /** Organizational unit (OU) of the certificate issuer. */
        public ?string $issuer_organizational_unit = null,
        /** State or province name (ST) of the certificate issuer. */
        public ?string $issuer_state = null,
        /** Type of private key; may be null. One of: rsa_1024, rsa_2048, rsa_4096, ec_prime256v1, ec_secp384r1. */
        public ?string $key_type = null,
        /** List of asserted key usage bits. */
        public ?array $key_usage = null,
        /** List of object identifiers for extended key usage. */
        public ?array $key_usage_extended = null,
        /** Custom field from certificate subject alternative name. */
        public ?string $mdps_custom_field = null,
        /** Device ICCID from certificate subject alternative name. */
        public ?string $mdps_device_iccid = null,
        /** Device IMEI from certificate subject alternative name. */
        public ?string $mdps_device_imei = null,
        /** Device name from certificate subject alternative name. */
        public ?string $mdps_device_name = null,
        /** Device serial from certificate subject alternative name. */
        public ?string $mdps_device_serial = null,
        /** Device type from certificate subject alternative name. */
        public ?string $mdps_device_type = null,
        /** Device UDID from certificate subject alternative name. */
        public ?string $mdps_device_udid = null,
        /** User email address from certificate subject alternative name. */
        public ?string $mdps_email_address = null,
        /** List of MAC addresses from certificate subject alternative name. */
        public ?array $mdps_mac_address = null,
        /** Product name from certificate subject alternative name. */
        public ?string $mdps_product_name = null,
        /** Product version from certificate subject alternative name. */
        public ?string $mdps_product_version = null,
        /** Username from certificate subject alternative name. */
        public ?string $mdps_user_name = null,
        /** Time at which the certificate was revoked; may be null. */
        public ?CarbonImmutable $revoked_at = null,
        /** True if the certificate is a self-signed CA certificate. */
        public ?bool $self_signed = null,
        /** Serial number of the certificate. */
        public ?string $serial_number = null,
        /** Algorithm used to digitally sign the certificate. */
        public ?string $signature_algorithm = null,
        /** Path representation of certificate subject’s distinguished name; components separated with forward slash (/). */
        public ?string $subject = null,
        /** String or object containing certificate’s alternative name properties; may be null. */
        public ?string $subject_alt_name_dn = null,
        /** Common name (CN) from certificate subject. */
        public ?string $subject_common_name = null,
        /** Country (C) from certificate subject. */
        public ?string $subject_country = null,
        /** Identity of the certificate. */
        public ?DistinguishedName $subject_dn = null,
        /** Email address from certificate subject. */
        public ?string $subject_email_address = null,
        /** Unique identifier of the certificate’s public key. */
        public ?string $subject_keyid = null,
        /** Locality (L) from certificate subject. */
        public ?string $subject_locality = null,
        /** Organization (O) from certificate subject. */
        public ?string $subject_organization = null,
        /** Organizational unit (OU) from certificate subject. */
        public ?string $subject_organizational_unit = null,
        /** State or province name (ST) from certificate subject. */
        public ?string $subject_state = null,
        /** Time at which the certificate will become valid. */
        public ?CarbonImmutable $valid_from = null,
        /** Time at which the certificate will expire. */
        public ?CarbonImmutable $valid_to = null,
    ) {}
}
