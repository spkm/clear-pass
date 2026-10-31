<?php

namespace spkm\ClearPass\Resources\EnforcementProfile;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\EnforcementProfile\TimeRange;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EnforcementProfile\TimeRange\CreateTimeRangeRequest;
use spkm\ClearPass\Requests\EnforcementProfile\TimeRange\DeleteTimeRangeByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\TimeRange\DeleteTimeRangeRequest;
use spkm\ClearPass\Requests\EnforcementProfile\TimeRange\GetTimeRangeByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\TimeRange\GetTimeRangeRequest;
use spkm\ClearPass\Requests\EnforcementProfile\TimeRange\GetTimeRangesRequest;
use spkm\ClearPass\Requests\EnforcementProfile\TimeRange\ReplaceTimeRangeByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\TimeRange\ReplaceTimeRangeRequest;
use spkm\ClearPass\Requests\EnforcementProfile\TimeRange\UpdateTimeRangeByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\TimeRange\UpdateTimeRangeRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage Time Range, from ClearPass::enforcementProfile()->timeRanges().
 *
 * @extends Builder<TimeRange>
 */
class TimeRangeResource extends Builder
{
    public function __construct(ClearPassConnector $connector, protected string $productName)
    {
        parent::__construct($connector, TimeRange::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetTimeRangesRequest($this->productName, $query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateTimeRangeRequest($this->productName, $body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetTimeRangeRequest($this->productName, (int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateTimeRangeRequest($this->productName, (int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceTimeRangeRequest($this->productName, (int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteTimeRangeRequest($this->productName, (int) $id, $options);
    }

    /**
     * Get a Time Range by name: GET /enforcement-profile-dur/time-range/{product_name}/name/{name}.
     */
    public function findByName(string $name): ?TimeRange
    {
        return $this->fetchOrNull(new GetTimeRangeByNameRequest($this->productName, $name));
    }

    /**
     * Update some fields of a Time Range by name: PATCH /enforcement-profile-dur/time-range/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?TimeRange
    {
        return $this->fetch(new UpdateTimeRangeByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a Time Range by name: PUT /enforcement-profile-dur/time-range/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?TimeRange
    {
        return $this->fetch(new ReplaceTimeRangeByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a Time Range by name: DELETE /enforcement-profile-dur/time-range/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteTimeRangeByNameRequest($this->productName, $name, $options));

        return true;
    }
}
