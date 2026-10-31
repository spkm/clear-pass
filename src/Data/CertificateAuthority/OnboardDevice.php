<?php

namespace spkm\ClearPass\Data\CertificateAuthority;

use spkm\ClearPass\Data\Data;

/**
 * A OnboardDevice record.
 */
readonly class OnboardDevice extends Data
{
    /**
     * @param  array<int, string>|null  $mac_address
     */
    public function __construct(
        /** SIM card unique serial number, if available. */
        public ?string $device_iccid = null,
        /** Unique identifier string. */
        public ?string $device_identifier = null,
        /** International Mobile Station Equipment Identity, if available. */
        public ?string $device_imei = null,
        /** Device name. */
        public ?string $device_name = null,
        /** Serial number of the device, if available. */
        public ?string $device_serial = null,
        /** Device type. One of: Other, Android, iOS, OS X, Windows, Ubuntu, Chromebook, Web, External. */
        public ?string $device_type = null,
        /** Unique device identifier. */
        public ?string $device_udid = null,
        /** Flag indicating device has been provisioned and currently has a valid certificate. */
        public ?bool $enrolled = null,
        /** Marketing name for the product. */
        public ?string $expanded_type = null,
        /** Numeric ID of the device. */
        public ?int $id = null,
        /** List of MAC addresses associated with the device. */
        public ?array $mac_address = null,
        /** Mobile device management (MDM) vendor name, if an endpoint context server reports the device as managed. */
        public ?string $mdm_managed = null,
        /** Product name of the device, if available. */
        public ?string $product_name = null,
        /** Product version string of the device, if available. */
        public ?string $product_version = null,
        /** Serial number of device certificate, if device type is "External". */
        public ?string $serial_number = null,
        /** Determines whether the device is able to enroll and access the network. One of: allowed, pending, denied. */
        public ?string $status = null,
        /** Usernames that have enrolled this device. */
        public ?string $usernames = null,
    ) {}
}
