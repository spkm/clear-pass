<?php

namespace spkm\ClearPass\Resources\GlobalServerConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\GlobalServerConfiguration\AdminUserPasswordPolicy;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\AdminUserPasswordPolicy\GetAdminUserPasswordPolicyRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\AdminUserPasswordPolicy\ReplaceAdminUserPasswordPolicyRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\AdminUserPasswordPolicy\UpdateAdminUserPasswordPolicyRequest;
use spkm\ClearPass\Resources\SingletonResource;

/**
 * Manage admin user password policies, from ClearPass::globalServerConfiguration()->adminUserPasswordPolicy().
 *
 * @extends SingletonResource<AdminUserPasswordPolicy>
 */
class AdminUserPasswordPolicyResource extends SingletonResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, AdminUserPasswordPolicy::class);
    }

    protected function getRequest(array $options): ClearPassRequest
    {
        return new GetAdminUserPasswordPolicyRequest;
    }

    protected function replaceRequest(array $body, array $options): ClearPassRequest
    {
        return new ReplaceAdminUserPasswordPolicyRequest($body, $options);
    }

    protected function updateRequest(array $body, array $options): ClearPassRequest
    {
        return new UpdateAdminUserPasswordPolicyRequest($body, $options);
    }
}
