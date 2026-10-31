<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\VoIPProfile;

use spkm\ClearPass\Data\EnforcementProfile\VoIPProfile;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * GET a list of VoIP Profiles: GET /enforcement-profile-dur/voip-profile/{product_name}.
 */
class GetVoIPProfilesRequest extends ListRequest
{
    protected ?string $dto = VoIPProfile::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $productName, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/voip-profile/'.rawurlencode((string) $this->productName);
    }
}
