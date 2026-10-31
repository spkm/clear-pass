<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use spkm\ClearPass\Data\Data;

/**
 * A PolicyRules record.
 */
readonly class PolicyRules extends Data
{
    public function __construct(
        /** Number. */
        public ?int $number = null,
        /** Class Type. ipv4 only applies to ArubaOS-Switch policy and ip only applies to AOS-CX policy. One of: ipv4, ip, ipv6. */
        public ?string $class_type = null,
        /** Class Name. */
        public ?string $class_name = null,
        /** Action. deny only applies to ArubaOS-Switch policy and drop only applies to AOS-CX policy. One of: permit, drop, deny, redirect. */
        public ?string $action = null,
        /** Exceed Action for AOS-CX policy. One of: drop. */
        public ?string $exceed_action = null,
        /** Committed Burst Size for AOS-CX policy (1-4294967295). */
        public ?int $committed_burst_size = null,
        /** Committed Information Rate for AOS-CX policy (1-4294967295). */
        public ?int $committed_information_rate = null,
        /** DSCP (0-63). */
        public ?int $dscp = null,
        /** IP Precedence (0-7). */
        public ?int $ip_precedence = null,
        /** Priority (0-7). */
        public ?int $priority = null,
        /** Priority Code Point for AOS-CX policy (0-7). */
        public ?int $priority_code_point = null,
        /** Rate Limit in kbps for ArubaOS-Switch policy (0-10000000). */
        public ?int $rate_limit = null,
    ) {}
}
