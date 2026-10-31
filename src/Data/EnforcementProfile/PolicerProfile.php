<?php

namespace spkm\ClearPass\Data\EnforcementProfile;

use spkm\ClearPass\Data\Data;

/**
 * A PolicerProfile record.
 */
readonly class PolicerProfile extends Data
{
    public function __construct(
        /** Numeric ID of the Policer Profile. */
        public ?int $id = null,
        /** Name of the Policer Profile. */
        public ?string $name = null,
        /** Exceed Action of the Policer Profile. */
        public ?string $exceed_action = null,
        /** Violate Action of the Policer Profile. */
        public ?string $violate_action = null,
        /** CBS (Bytes) of the Policer Profile. */
        public ?int $cbs = null,
        /** CIR (Kbps) of the Policer Profile. */
        public ?int $cir = null,
        /** EBS (Bytes) of the Policer Profile. */
        public ?int $ebs = null,
        /** Exceed QoS Profile of the Policer Profile. */
        public ?string $exceed_qos_profile = null,
        /** Violate QoS Profile of the Policer Profile. */
        public ?string $violate_qos_profile = null,
    ) {}
}
