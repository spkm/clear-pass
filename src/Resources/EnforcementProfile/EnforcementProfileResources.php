<?php

namespace spkm\ClearPass\Resources\EnforcementProfile;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Resources\BaseResource;

/**
 * The EnforcementProfile API: ClearPass::enforcementProfile().
 *
 * @extends BaseResource<Data>
 */
class EnforcementProfileResources extends BaseResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Manage Captive Portal Profile.
     */
    public function captivePortalProfiles(string $productName): CaptivePortalProfileResource
    {
        return new CaptivePortalProfileResource($this->connector, $productName);
    }

    /**
     * Manage DUR Class.
     */
    public function durClasses(string $productName): DURClassResource
    {
        return new DURClassResource($this->connector, $productName);
    }

    /**
     * Manage Enforcement Profiles.
     */
    public function enforcementProfiles(): EnforcementProfileResource
    {
        return new EnforcementProfileResource($this->connector);
    }

    /**
     * Manage Ethertype Access Control List.
     */
    public function ethertypeAccessControlLists(string $productName): EthertypeAccessControlListResource
    {
        return new EthertypeAccessControlListResource($this->connector, $productName);
    }

    /**
     * Manage MAC Access Control List.
     */
    public function macAccessControlLists(string $productName): MACAccessControlListResource
    {
        return new MACAccessControlListResource($this->connector, $productName);
    }

    /**
     * Manage NAT Pool.
     */
    public function natPools(string $productName): NATPoolResource
    {
        return new NATPoolResource($this->connector, $productName);
    }

    /**
     * Manage Net Destination.
     */
    public function netDestinations(string $productName): NetDestinationResource
    {
        return new NetDestinationResource($this->connector, $productName);
    }

    /**
     * Manage Net Services.
     */
    public function netServices(string $productName): NetServiceResource
    {
        return new NetServiceResource($this->connector, $productName);
    }

    /**
     * Manage Policer Profile.
     */
    public function policerProfiles(string $productName): PolicerProfileResource
    {
        return new PolicerProfileResource($this->connector, $productName);
    }

    /**
     * Manage Policy.
     */
    public function policies(string $productName): PolicyResource
    {
        return new PolicyResource($this->connector, $productName);
    }

    /**
     * Manage QoS Profiles.
     */
    public function qosProfiles(string $productName): QoSProfileResource
    {
        return new QoSProfileResource($this->connector, $productName);
    }

    /**
     * Manage Session Access Control List.
     */
    public function sessionAccessControlLists(string $productName): SessionAccessControlListResource
    {
        return new SessionAccessControlListResource($this->connector, $productName);
    }

    /**
     * Manage Stateless Access Control List.
     */
    public function statelessAccessControlLists(string $productName): StatelessAccessControlListResource
    {
        return new StatelessAccessControlListResource($this->connector, $productName);
    }

    /**
     * Manage Time Range.
     */
    public function timeRanges(string $productName): TimeRangeResource
    {
        return new TimeRangeResource($this->connector, $productName);
    }

    /**
     * Manage VoIP Profile.
     */
    public function voipProfiles(string $productName): VoIPProfileResource
    {
        return new VoIPProfileResource($this->connector, $productName);
    }
}
