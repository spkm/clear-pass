<?php

namespace spkm\ClearPass\Resources\SessionControl;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\SessionControl\ActiveSessionAction;
use spkm\ClearPass\Data\SessionControl\ReauthorizationProfiles;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\SessionControl\ActiveSessionReauthorize\GetActiveSessionReauthorizeRequest;
use spkm\ClearPass\Requests\SessionControl\ActiveSessionReauthorize\ReauthorizeActiveSessionRequest;
use spkm\ClearPass\Resources\SingletonResource;

/**
 * Reauthorize an active session, from ClearPass::sessionControl()->activeSessionReauthorize().
 *
 * @extends SingletonResource<ReauthorizationProfiles>
 */
class ActiveSessionReauthorizeResource extends SingletonResource
{
    public function __construct(ClearPassConnector $connector, protected int|string $id)
    {
        parent::__construct($connector, ReauthorizationProfiles::class);
    }

    protected function getRequest(array $options): ClearPassRequest
    {
        return new GetActiveSessionReauthorizeRequest($this->id, $options);
    }

    /**
     * Reauthorize active session: POST /session/{id}/reauthorize.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function reauthorize(array|Data $attributes = [], array $options = []): ?ActiveSessionAction
    {
        return $this->fetch(new ReauthorizeActiveSessionRequest($this->id, $this->payloadOf($attributes), $options));
    }
}
