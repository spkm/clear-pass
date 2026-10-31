<?php

namespace spkm\ClearPass\Requests\Identities\Device;

use spkm\ClearPass\Data\Identities\Device;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of device accounts: GET /device.
 */
class GetDevicesRequest extends ListRequest
{
    protected ?string $dto = Device::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/device';
    }
}
