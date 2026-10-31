<?php

namespace spkm\ClearPass\Resources\EndpointVisibility;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Resources\BaseResource;

/**
 * The EndpointVisibility API: ClearPass::endpointVisibility().
 *
 * @extends BaseResource<Data>
 */
class EndpointVisibilityResources extends BaseResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Manage Agentless OnGuard settings.
     */
    public function agentlessOnGuardSettings(): AgentlessOnGuardSettingsResource
    {
        return new AgentlessOnGuardSettingsResource($this->connector);
    }

    /**
     * Manage Agentless OnGuard subnet mappings.
     */
    public function agentlessOnGuardSubnetMappings(): AgentlessOnGuardSubnetMappingResource
    {
        return new AgentlessOnGuardSubnetMappingResource($this->connector);
    }

    /**
     * Manage Device Fingerprint Profiling.
     */
    public function deviceFingerprint(): DeviceFingerprintResource
    {
        return new DeviceFingerprintResource($this->connector);
    }

    /**
     * Manage Fingerprints.
     */
    public function fingerprintDictionaries(): FingerprintDictionaryResource
    {
        return new FingerprintDictionaryResource($this->connector);
    }

    /**
     * Manage NetworkScan Services.
     */
    public function networkScans(): NetworkScanResource
    {
        return new NetworkScanResource($this->connector);
    }

    /**
     * Manage OnGuard Activity.
     */
    public function onGuardActivities(): OnGuardActivityResource
    {
        return new OnGuardActivityResource($this->connector);
    }

    /**
     * Manage OnGuard Custom Scripts.
     */
    public function onGuardCustomScripts(): OnGuardCustomScriptResource
    {
        return new OnGuardCustomScriptResource($this->connector);
    }

    /**
     * Manage OnGuard global settings.
     */
    public function onGuardGlobalSettings(): OnGuardGlobalSettingsResource
    {
        return new OnGuardGlobalSettingsResource($this->connector);
    }

    /**
     * Manage OnGuard settings.
     */
    public function onGuardSettings(): OnGuardSettingsResource
    {
        return new OnGuardSettingsResource($this->connector);
    }

    /**
     * API's to configure authentication server IP addresses per zone.
     */
    public function onGuardZoneMappings(): OnGuardZoneMappingResource
    {
        return new OnGuardZoneMappingResource($this->connector);
    }

    /**
     * Manage profiler subnet mappings.
     */
    public function profilerSubnetMappings(): ProfilerSubnetMappingResource
    {
        return new ProfilerSubnetMappingResource($this->connector);
    }

    /**
     * Manage Windows Hotfix.
     */
    public function windowsHotfixes(): WindowsHotfixResource
    {
        return new WindowsHotfixResource($this->connector);
    }
}
