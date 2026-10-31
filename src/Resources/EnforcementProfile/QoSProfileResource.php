<?php

namespace spkm\ClearPass\Resources\EnforcementProfile;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\EnforcementProfile\QoSProfile;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\EnforcementProfile\QoSProfile\CreateQoSProfileRequest;
use spkm\ClearPass\Requests\EnforcementProfile\QoSProfile\DeleteQoSProfileByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\QoSProfile\DeleteQoSProfileRequest;
use spkm\ClearPass\Requests\EnforcementProfile\QoSProfile\GetQoSProfileByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\QoSProfile\GetQoSProfileRequest;
use spkm\ClearPass\Requests\EnforcementProfile\QoSProfile\GetQoSProfilesRequest;
use spkm\ClearPass\Requests\EnforcementProfile\QoSProfile\ReplaceQoSProfileByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\QoSProfile\ReplaceQoSProfileRequest;
use spkm\ClearPass\Requests\EnforcementProfile\QoSProfile\UpdateQoSProfileByNameRequest;
use spkm\ClearPass\Requests\EnforcementProfile\QoSProfile\UpdateQoSProfileRequest;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Manage QoS Profiles, from ClearPass::enforcementProfile()->qosProfiles().
 *
 * @extends Builder<QoSProfile>
 */
class QoSProfileResource extends Builder
{
    public function __construct(ClearPassConnector $connector, protected string $productName)
    {
        parent::__construct($connector, QoSProfile::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetQoSProfilesRequest($this->productName, $query);
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateQoSProfileRequest($this->productName, $body, $options);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetQoSProfileRequest($this->productName, (int) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateQoSProfileRequest($this->productName, (int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new ReplaceQoSProfileRequest($this->productName, (int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ClearPassRequest
    {
        return new DeleteQoSProfileRequest($this->productName, (int) $id, $options);
    }

    /**
     * Get a QoS Profile by name: GET /enforcement-profile-dur/qos-profile/{product_name}/name/{name}.
     */
    public function findByName(string $name): ?QoSProfile
    {
        return $this->fetchOrNull(new GetQoSProfileByNameRequest($this->productName, $name));
    }

    /**
     * Update some fields of a QoS Profile by name: PATCH /enforcement-profile-dur/qos-profile/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByName(string $name, array|Data $attributes = [], array $options = []): ?QoSProfile
    {
        return $this->fetch(new UpdateQoSProfileByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace a QoS Profile by name: PUT /enforcement-profile-dur/qos-profile/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceByName(string $name, array|Data $attributes = [], array $options = []): ?QoSProfile
    {
        return $this->fetch(new ReplaceQoSProfileByNameRequest($this->productName, $name, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a QoS Profile by name: DELETE /enforcement-profile-dur/qos-profile/{product_name}/name/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteByName(string $name, array $options = []): bool
    {
        $this->fetch(new DeleteQoSProfileByNameRequest($this->productName, $name, $options));

        return true;
    }
}
