<?php

namespace spkm\ClearPass\Resources\Insight;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\Insight\Alert;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\Insight\Alert\CreateAlertRequest;
use spkm\ClearPass\Requests\Insight\Alert\DeleteAlertByNameRequest;
use spkm\ClearPass\Requests\Insight\Alert\DeleteAlertRequest;
use spkm\ClearPass\Requests\Insight\Alert\DisableAlertByNameRequest;
use spkm\ClearPass\Requests\Insight\Alert\DisableAlertRequest;
use spkm\ClearPass\Requests\Insight\Alert\EnableAlertByNameRequest;
use spkm\ClearPass\Requests\Insight\Alert\EnableAlertRequest;
use spkm\ClearPass\Requests\Insight\Alert\GetAlertByNameRequest;
use spkm\ClearPass\Requests\Insight\Alert\GetAlertRequest;
use spkm\ClearPass\Requests\Insight\Alert\GetAlertsRequest;
use spkm\ClearPass\Requests\Insight\Alert\MuteAlertByNameRequest;
use spkm\ClearPass\Requests\Insight\Alert\MuteAlertRequest;
use spkm\ClearPass\Requests\Insight\Alert\ReplaceAlertByNameRequest;
use spkm\ClearPass\Requests\Insight\Alert\ReplaceAlertRequest;
use spkm\ClearPass\Requests\Insight\Alert\UnmuteAlertByNameRequest;
use spkm\ClearPass\Requests\Insight\Alert\UnmuteAlertRequest;
use spkm\ClearPass\Requests\Insight\Alert\UpdateAlertByNameRequest;
use spkm\ClearPass\Requests\Insight\Alert\UpdateAlertRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Operations for Alert, from ClearPass::insight()->alerts().
 *
 * @extends Builder<Alert>
 */
class AlertResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, Alert::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAlertsRequest($query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateAlertRequest($body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetAlertRequest((int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateAlertRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceAlertRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteAlertRequest((int) $id, $options);
    }

    /**
     * Get an Insight alert configuration by name: GET /alert/{name}.
     */
    public function findByName(string $name): ?Alert
    {
        return $this->fetchOrNull(new GetAlertByNameRequest($name));
    }

    /**
     * Partial update of an Insight alert configuration by name: PATCH /alert/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?Alert
    {
        return $this->fetch(new UpdateAlertByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Complete update of an Insight alert configuration by name: PUT /alert/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?Alert
    {
        return $this->fetch(new ReplaceAlertByNameRequest($name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete an Insight alert configuration by name: DELETE /alert/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteAlertByNameRequest($name, $options));

        return true;
    }

    /**
     * Enable an Insight alert configuration by id: PATCH /alert/{id}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enable(int $id, array $options = []): ?Alert
    {
        return $this->fetch(new EnableAlertRequest($id, $options));
    }

    /**
     * Disable an Insight alert configuration by id: PATCH /alert/{id}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disable(int $id, array $options = []): ?Alert
    {
        return $this->fetch(new DisableAlertRequest($id, $options));
    }

    /**
     * Mute an Insight alert configuration by id: PATCH /alert/{id}/mute.
     *
     * @param  array<string, mixed>  $options
     */
    public function mute(int $id, array $options = []): ?Alert
    {
        return $this->fetch(new MuteAlertRequest($id, $options));
    }

    /**
     * Unmute an Insight alert configuration by id: PATCH /alert/{id}/unmute.
     *
     * @param  array<string, mixed>  $options
     */
    public function unmute(int $id, array $options = []): ?Alert
    {
        return $this->fetch(new UnmuteAlertRequest($id, $options));
    }

    /**
     * Enable an Insight alert configuration by name: PATCH /alert/{name}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enableByName(string $name, array $options = []): ?Alert
    {
        return $this->fetch(new EnableAlertByNameRequest($name, $options));
    }

    /**
     * Disable an Insight alert configuration by name: PATCH /alert/{name}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disableByName(string $name, array $options = []): ?Alert
    {
        return $this->fetch(new DisableAlertByNameRequest($name, $options));
    }

    /**
     * Mute an Insight alert configuration by name: PATCH /alert/{name}/mute.
     *
     * @param  array<string, mixed>  $options
     */
    public function muteByName(string $name, array $options = []): ?Alert
    {
        return $this->fetch(new MuteAlertByNameRequest($name, $options));
    }

    /**
     * Unmute an Insight alert configuration by name: PATCH /alert/{name}/unmute.
     *
     * @param  array<string, mixed>  $options
     */
    public function unmuteByName(string $name, array $options = []): ?Alert
    {
        return $this->fetch(new UnmuteAlertByNameRequest($name, $options));
    }
}
