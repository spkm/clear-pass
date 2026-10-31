<?php

namespace spkm\ClearPass\Data\CertificateAuthority;

use spkm\ClearPass\Data\Data;

/**
 * A CertificateNew record.
 */
readonly class CertificateNew extends Data
{
    public function __construct(
        /** Select the certificate authority that will be used to sign this request. One of: 1. */
        public ?int $ca_id = null,
        /** Select the type of certificate to create from this signing request. One of: tls-client, trusted, ca, code-signing, https. */
        public ?string $cert_type = null,
        /** Enter the 2-letter ISO country code of your country. */
        public ?string $country = null,
        /** Enter the full name of your state or province. */
        public ?string $state = null,
        /** Enter the name of your locality (town or city). */
        public ?string $locality = null,
        /** Enter the name of your organization or company. */
        public ?string $organization = null,
        /** Enter a name for the certificate. This is the ‘common name’ of the digital certificate. */
        public ?string $common_name = null,
        /** Enter an email address. */
        public ?string $email_address = null,
        /** Select the type of private key to create for the certificate. One of: rsa_1024, rsa_2048, rsa_4096, ec_prime256v1, ec_secp384r1. */
        public ?string $key_type = null,
        /** Custom fields to store in certificate subject alternative name. */
        public ?string $custom_field = null,
        /** The number of days before the certificate will expire. */
        public ?string $days = null,
        /** Device ICCID to store in certificate subject alternative name. */
        public ?string $device_iccid = null,
        /** Device IMEI to store in certificate subject alternative name. */
        public ?string $device_imei = null,
        /** Device name to store in certificate subject alternative name. */
        public ?string $device_name = null,
        /** Device serial to store in certificate subject alternative name. */
        public ?string $device_serial = null,
        /** Device type to store in certificate subject alternative name. */
        public ?string $device_type = null,
        /** Device UDID to store in certificate subject alternative name. */
        public ?string $device_udid = null,
        /** Host names to include in the Subject Alt Name extension. Multiple values can be included, one per line. */
        public ?string $dns_name = null,
        /** Issue this certificate immediately. */
        public ?bool $issue_cert = null,
        /** List of MAC addresses to store in certificate subject alternative name. */
        public ?string $mac_address = null,
        /** Enter the name of your organizational unit (e.g. section or division of the company). */
        public ?string $organizational_unit = null,
        /** Product name to store in certificate subject alternative name. */
        public ?string $product_name = null,
        /** Product version to store in certificate subject alternative name. */
        public ?string $product_version = null,
        /** User’s email address to store in certificate subject alternative name. */
        public ?string $user_email_address = null,
        /** Username to store in certificate subject alternative name. */
        public ?string $user_name = null,
    ) {}
}
