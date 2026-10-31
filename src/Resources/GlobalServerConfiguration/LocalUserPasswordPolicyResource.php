<?php

namespace spkm\ClearPass\Resources\GlobalServerConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\GlobalServerConfiguration\LocalUserPasswordPolicy;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\LocalUserPasswordPolicy\GetLocalUserPasswordPolicyRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\LocalUserPasswordPolicy\ReplaceLocalUserPasswordPolicyRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\LocalUserPasswordPolicy\UpdateLocalUserPasswordPolicyRequest;
use spkm\ClearPass\Resources\SingletonResource;

/**
 * Manage local user password policies, from ClearPass::globalServerConfiguration()->localUserPasswordPolicy().
 *
 * @extends SingletonResource<LocalUserPasswordPolicy>
 */
class LocalUserPasswordPolicyResource extends SingletonResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, LocalUserPasswordPolicy::class);
    }

    protected function getRequest(array $options): ClearPassRequest
    {
        return new GetLocalUserPasswordPolicyRequest;
    }

    protected function replaceRequest(array $body, array $options): ClearPassRequest
    {
        return new ReplaceLocalUserPasswordPolicyRequest($body, $options);
    }

    protected function updateRequest(array $body, array $options): ClearPassRequest
    {
        return new UpdateLocalUserPasswordPolicyRequest($body, $options);
    }
}
