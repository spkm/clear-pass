<?php

namespace spkm\ClearPass\Resources\PolicyElements;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Resources\BaseResource;

/**
 * The PolicyElements API: ClearPass::policyElements().
 *
 * @extends BaseResource<Data>
 */
class PolicyElementsResources extends BaseResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Manage Application Dictionaries.
     */
    public function applicationDictionaries(): ApplicationDictionaryResource
    {
        return new ApplicationDictionaryResource($this->connector);
    }

    /**
     * Manage authentication methods.
     */
    public function authMethods(): AuthMethodResource
    {
        return new AuthMethodResource($this->connector);
    }

    /**
     * Manage authentication sources.
     */
    public function authSources(): AuthSourceResource
    {
        return new AuthSourceResource($this->connector);
    }

    /**
     * Manage Enforcement Policies.
     */
    public function enforcementPolicies(): EnforcementPolicyResource
    {
        return new EnforcementPolicyResource($this->connector);
    }

    /**
     * Manage network device groups.
     */
    public function networkDeviceGroups(): NetworkDeviceGroupResource
    {
        return new NetworkDeviceGroupResource($this->connector);
    }

    /**
     * Manage network devices.
     */
    public function networkDevices(): NetworkDeviceResource
    {
        return new NetworkDeviceResource($this->connector);
    }

    /**
     * Manage Posture Policies.
     */
    public function posturePolicies(): PosturePolicyResource
    {
        return new PosturePolicyResource($this->connector);
    }

    /**
     * Manage RADIUS Dictionaries.
     */
    public function radiusDictionaries(): RADIUSDictionaryResource
    {
        return new RADIUSDictionaryResource($this->connector);
    }

    /**
     * Manage RADIUS Dynamic Authorization Templates.
     */
    public function radiusDynamicAuthorizationTemplates(): RADIUSDynamicAuthorizationTemplateResource
    {
        return new RADIUSDynamicAuthorizationTemplateResource($this->connector);
    }

    /**
     * Manage proxy targets.
     */
    public function radiusProxyTargets(): RADIUSProxyTargetResource
    {
        return new RADIUSProxyTargetResource($this->connector);
    }

    /**
     * Manage Role Mappings.
     */
    public function roleMappings(): RoleMappingResource
    {
        return new RoleMappingResource($this->connector);
    }

    /**
     * Manage roles.
     */
    public function roles(): RoleResource
    {
        return new RoleResource($this->connector);
    }

    /**
     * Manage Configuration Services.
     */
    public function services(): ServiceResource
    {
        return new ServiceResource($this->connector);
    }

    /**
     * Manage TACACS+ Service Dictionaries.
     */
    public function tacacsServiceDictionaries(): TACACSServiceDictionaryResource
    {
        return new TACACSServiceDictionaryResource($this->connector);
    }
}
