<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\QoSProfile;

use spkm\ClearPass\Data\EnforcementProfile\QoSProfile;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * GET a list of QoS Profiles: GET /enforcement-profile-dur/qos-profile/{product_name}.
 */
class GetQoSProfilesRequest extends ListRequest
{
    protected ?string $dto = QoSProfile::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $productName, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/qos-profile/'.rawurlencode((string) $this->productName);
    }
}
