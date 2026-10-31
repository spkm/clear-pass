<?php

namespace spkm\ClearPass\Data\CertificateAuthority;

use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

/**
 * A CertificateChain record.
 */
readonly class CertificateChain extends Data
{
    protected const LISTS = ['chain' => Certificate::class];

    /**
     * @param  Collection<int, Certificate>|null  $chain
     */
    public function __construct(
        public ?int $error = null,
        /** A collection of Certificate. */
        public ?Collection $chain = null,
        public ?bool $complete = null,
    ) {}
}
