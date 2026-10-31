<?php

namespace spkm\ClearPass\Resources\EndpointVisibility;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\EndpointVisibility\OnGuardActivity;
use spkm\ClearPass\Data\EndpointVisibility\OnGuardActivityResponse;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardActivity\CreateOnGuardActivityMessageRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardActivity\CreateOnGuardActivityNotificationRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardActivity\GetOnGuardActivitiesRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardActivity\GetOnGuardActivityByHostMacRequest;
use spkm\ClearPass\Requests\EndpointVisibility\OnGuardActivity\GetOnGuardActivityRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage OnGuard Activity, from ClearPass::endpointVisibility()->onGuardActivities().
 *
 * @extends Builder<OnGuardActivity>
 */
class OnGuardActivityResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, OnGuardActivity::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetOnGuardActivitiesRequest($query);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetOnGuardActivityRequest((int) $id);
    }

    /**
     * Get a Clearpass OnGuard Endpoint Details by host_mac: GET /onguard-activity/host_mac/{host_mac}.
     */
    public function findByHostMac(string $hostMac): ?OnGuardActivity
    {
        return $this->fetchOrNull(new GetOnGuardActivityByHostMacRequest($hostMac));
    }

    /**
     * Send/Broadcast Message: POST /onguard-activity/message.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createMessage(array|Data $attributes = [], array $options = []): ?OnGuardActivityResponse
    {
        return $this->fetch(new CreateOnGuardActivityMessageRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Send/Broadcast Notification: POST /onguard-activity/notification.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createNotification(array|Data $attributes = [], array $options = []): ?OnGuardActivityResponse
    {
        return $this->fetch(new CreateOnGuardActivityNotificationRequest($this->payloadOf($attributes), $options));
    }
}
