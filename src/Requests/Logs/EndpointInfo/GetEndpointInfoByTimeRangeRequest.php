<?php

namespace spkm\ClearPass\Requests\Logs\EndpointInfo;

use spkm\ClearPass\Data\Logs\EndpointInfo;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Look up endpoints by time range: GET /insight/endpoint/time-range/{from_time}/{to_time}.
 */
class GetEndpointInfoByTimeRangeRequest extends ItemRequest
{
    protected ?string $dto = EndpointInfo::class;

    public function __construct(protected string $fromTime, protected string $toTime) {}

    public function resolveEndpoint(): string
    {
        return '/insight/endpoint/time-range/'.rawurlencode((string) $this->fromTime).'/'.rawurlencode((string) $this->toTime);
    }
}
