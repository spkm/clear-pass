<?php

namespace spkm\ClearPass\Resources\Insight;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Resources\BaseResource;

/**
 * The Insight API: ClearPass::insight().
 *
 * @extends BaseResource<Data>
 */
class InsightResources extends BaseResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Operations for Alert.
     */
    public function alerts(): AlertResource
    {
        return new AlertResource($this->connector);
    }

    /**
     * Operations for Report.
     */
    public function reports(): ReportResource
    {
        return new ReportResource($this->connector);
    }
}
