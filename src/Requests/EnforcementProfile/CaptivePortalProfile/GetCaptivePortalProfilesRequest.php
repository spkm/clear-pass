<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\CaptivePortalProfile;

use spkm\ClearPass\Data\EnforcementProfile\CaptivePortalProfile;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * GET a list of Captive Portal Profiles: GET /enforcement-profile-dur/captive-portal-profile/{product_name}.
 */
class GetCaptivePortalProfilesRequest extends ListRequest
{
    protected ?string $dto = CaptivePortalProfile::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $productName, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/captive-portal-profile/'.rawurlencode((string) $this->productName);
    }
}
