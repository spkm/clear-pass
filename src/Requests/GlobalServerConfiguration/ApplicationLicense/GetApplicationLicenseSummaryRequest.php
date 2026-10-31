<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\ApplicationLicense;

use spkm\ClearPass\Data\GlobalServerConfiguration\ApplicationLicenseSummary;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get application license summary: GET /application-license/summary.
 */
class GetApplicationLicenseSummaryRequest extends ItemRequest
{
    protected ?string $dto = ApplicationLicenseSummary::class;

    public function resolveEndpoint(): string
    {
        return '/application-license/summary';
    }
}
