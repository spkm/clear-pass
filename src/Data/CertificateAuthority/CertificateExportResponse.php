<?php

namespace spkm\ClearPass\Data\CertificateAuthority;

use spkm\ClearPass\Data\Data;

/**
 * A CertificateExportResponse record.
 */
readonly class CertificateExportResponse extends Data
{
    protected const ALIASES = ['HTTP_Content_Disposition' => 'HTTP:Content-Disposition'];

    public function __construct(
        /** attachment; The response is file data and does not contain JSON. */
        public ?string $HTTP_Content_Disposition = null,
    ) {}
}
