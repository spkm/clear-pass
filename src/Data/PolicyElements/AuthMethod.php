<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A AuthMethod record.
 */
readonly class AuthMethod extends Data
{
    /**
     * @param  array<int, string>|null  $inner_methods
     */
    public function __construct(
        /** Numeric ID of the auth method. */
        public ?int $id = null,
        /** Name of the auth method. */
        public ?string $name = null,
        /** Type of the auth method. One of: Authorize, CHAP, EAP-FAST, EAP-GTC, EAP-MD5, EAP-MSCHAPv2, EAP-PEAP, EAP-PEAP-Public, EAP-PWD, EAP-TLS, EAP-TTLS, MAC-AUTH, MSCHAP, PAP, TEAP. */
        public ?string $method_type = null,
        /** Details JSON object of the auth method. */
        public ?AuthMethodDetails $details = null,
        /** List of inner methods of the auth method. */
        public ?array $inner_methods = null,
        /** Description of the auth method. */
        public ?string $description = null,
    ) {}
}
