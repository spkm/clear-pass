<?php

namespace spkm\ClearPass\Data\CertificateAuthority;

use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

/**
 * A CertificateSignRequest record.
 */
readonly class CertificateSignRequest extends Data
{
    protected const LISTS = ['custom_subject' => SubjectField::class, 'custom_subject_alt_name' => SubjectAltNameField::class];

    /**
     * @param  Collection<int, SubjectField>|null  $custom_subject
     * @param  Collection<int, SubjectAltNameField>|null  $custom_subject_alt_name
     */
    public function __construct(
        /** Numeric ID of the certificate authority. One of: 1. */
        public ?int $ca_id = null,
        /** The number of days before the certificate will expire. */
        public ?int $days = null,
        /** Select this checkbox to sign the request and issue a certificate. */
        public ?bool $confirm_sign = null,
        /** If specified, a list of field/value pairs for the subject of the issued certificate. A collection of SubjectField. */
        public ?Collection $custom_subject = null,
        /** If specified, a list of field/value pairs for the subjectAltName of the issued certificate. A collection of SubjectAltNameField. */
        public ?Collection $custom_subject_alt_name = null,
    ) {}
}
