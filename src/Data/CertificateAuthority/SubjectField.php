<?php

namespace spkm\ClearPass\Data\CertificateAuthority;

use spkm\ClearPass\Data\Data;

/**
 * A SubjectField record.
 */
readonly class SubjectField extends Data
{
    public function __construct(
        /** Field within the subject. One of: C, ST, L, O, OU, CN, emailAddress, mdpsDeviceName, mdpsDeviceType, mdpsMacAddress, mdpsDeviceSerial, mdpsDeviceImei, mdpsDeviceIccid, mdpsDeviceUdid, mdpsProductName, mdpsProductVersion, mdpsUserName, mdpsEmailAddress, mdpsCustomField. */
        public ?string $field = null,
        /** Value of the field. */
        public ?string $value = null,
    ) {}
}
