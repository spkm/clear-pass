<?php

namespace spkm\ClearPass\Resources\Insight;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\Insight\Report;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\Insight\Report\CreateReportRequest;
use spkm\ClearPass\Requests\Insight\Report\DeleteReportByNameRequest;
use spkm\ClearPass\Requests\Insight\Report\DeleteReportRequest;
use spkm\ClearPass\Requests\Insight\Report\DisableReportByNameRequest;
use spkm\ClearPass\Requests\Insight\Report\DisableReportRequest;
use spkm\ClearPass\Requests\Insight\Report\EnableReportByNameRequest;
use spkm\ClearPass\Requests\Insight\Report\EnableReportRequest;
use spkm\ClearPass\Requests\Insight\Report\GetReportByNameRequest;
use spkm\ClearPass\Requests\Insight\Report\GetReportRequest;
use spkm\ClearPass\Requests\Insight\Report\GetReportsRequest;
use spkm\ClearPass\Requests\Insight\Report\ReplaceReportByNameRequest;
use spkm\ClearPass\Requests\Insight\Report\ReplaceReportRequest;
use spkm\ClearPass\Requests\Insight\Report\RunReportByNameRequest;
use spkm\ClearPass\Requests\Insight\Report\RunReportRequest;
use spkm\ClearPass\Requests\Insight\Report\UpdateReportByNameRequest;
use spkm\ClearPass\Requests\Insight\Report\UpdateReportRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Operations for Report, from ClearPass::insight()->reports().
 *
 * @extends Builder<Report>
 */
class ReportResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, Report::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetReportsRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateReportRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetReportRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateReportRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceReportRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteReportRequest((int) $id, $options);
    }

    /**
     * Get an Insight report configuration by name: GET /report/{name}.
     */
    public function findByName(int $name): ?Report
    {
        return $this->fetchOrNull(new GetReportByNameRequest($name));
    }

    /**
     * Partial update of an Insight report configuration by name: PATCH /report/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(int $name, array|Data $attributes = [], array $options = []): ?Report
    {
        return $this->fetch(new UpdateReportByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Complete update of an Insight report configuration by name: PUT /report/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(int $name, array|Data $attributes = [], array $options = []): ?Report
    {
        return $this->fetch(new ReplaceReportByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete an Insight report configuration by name: DELETE /report/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(int $name, array $options = []): bool
    {
        $this->fetch(new DeleteReportByNameRequest($name, $options));

        return true;
    }

    /**
     * Enable an Insight report configuration by id: PATCH /report/{id}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enable(int $id, array $options = []): ?Report
    {
        return $this->fetch(new EnableReportRequest($id, $options));
    }

    /**
     * Disable an Insight report configuration by id: PATCH /report/{id}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disable(int $id, array $options = []): ?Report
    {
        return $this->fetch(new DisableReportRequest($id, $options));
    }

    /**
     * Enable an Insight report configuration by name: PATCH /report/{name}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enableByName(int $name, array $options = []): ?Report
    {
        return $this->fetch(new EnableReportByNameRequest($name, $options));
    }

    /**
     * Disable an Insight report configuration by name: PATCH /report/{name}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disableByName(int $name, array $options = []): ?Report
    {
        return $this->fetch(new DisableReportByNameRequest($name, $options));
    }

    /**
     * Run an Insight report by id: POST /report/{id}/run.
     *
     * @param  array<string, mixed>  $options
     */
    public function run(int $id, array $options = []): ?Report
    {
        return $this->fetch(new RunReportRequest($id, $options));
    }

    /**
     * Run an Insight report by name: POST /report/{name}/run.
     *
     * @param  array<string, mixed>  $options
     */
    public function runByName(int $name, array $options = []): ?Report
    {
        return $this->fetch(new RunReportByNameRequest($name, $options));
    }
}
