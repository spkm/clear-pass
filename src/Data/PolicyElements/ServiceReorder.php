<?php

namespace spkm\ClearPass\Data\PolicyElements;

use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

/**
 * A ServiceReorder record.
 */
readonly class ServiceReorder extends Data
{
    protected const LISTS = ['service_orders' => ServiceOrders::class];

    /**
     * @param  Collection<int, ServiceOrders>|null  $service_orders
     */
    public function __construct(
        /** List of Service Orders to be updated. A collection of ServiceOrders. */
        public ?Collection $service_orders = null,
    ) {}
}
