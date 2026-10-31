<?php

namespace spkm\ClearPass\Data\PolicyElements;

use spkm\ClearPass\Data\Data;

/**
 * A ServiceOrders record.
 */
readonly class ServiceOrders extends Data
{
    public function __construct(
        /** Name of the Service. */
        public ?string $service_name = null,
        /** Order number of the Service. */
        public ?int $order_no = null,
    ) {}
}
