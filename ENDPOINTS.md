# Endpoints

Every call the package makes to ClearPass, by API. Resources are reached from the facade, `ClearPass::{api}()->{resource}()`; requests are plain Saloon classes under `spkm\ClearPass\Requests\{Api}\{Service}` for `ClearPass::send()`.

## ApiOperations

`ClearPass::apiOperations()`

| Call | Returns |
|---|---|
| `ClearPass::apiOperations()->obtainToken(...)` | `OAuth2Response` or null |
| `ClearPass::apiOperations()->tokenInfo()` | the setting as `TokenInfo`: `get()`, `create()` |
| `ClearPass::apiOperations()->tokenPrivileges()` | `TokenPrivileges` or null |

| Request | Method | Path | Returns |
|---|---|---|---|
| `ApiOperations\TokenEndpoint\ObtainTokenRequest` | POST | `/oauth` | `OAuth2Response` or null |
| `ApiOperations\TokenInfo\GetTokenInfoRequest` | GET | `/oauth/me` | `TokenInfo` or null |
| `ApiOperations\TokenInfo\CreateTokenInfoRequest` | POST | `/oauth/me` | `TokenInfo` or null |
| `ApiOperations\TokenPrivileges\GetTokenPrivilegesRequest` | GET | `/oauth/privileges` | `TokenPrivileges` or null |

## CertificateAuthority

`ClearPass::certificateAuthority()`

| Call | Returns |
|---|---|
| `ClearPass::certificateAuthority()->certificateChain(...)` | `CertificateChain` or null |
| `ClearPass::certificateAuthority()->certificates()` | a builder over `Certificate` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `delete()` |
| `ClearPass::certificateAuthority()->createCertificate(...)` | `Certificate` or null |
| `ClearPass::certificateAuthority()->exportCertificate(...)` | `CertificateExportResponse` or null |
| `ClearPass::certificateAuthority()->importCertificate(...)` | `Certificate` or null |
| `ClearPass::certificateAuthority()->onboardDevices()` | a builder over `OnboardDevice` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `update()`, `delete()` |
| `ClearPass::certificateAuthority()->onboardUsers()` | a builder over `OnboardUser` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `update()`, `delete()` |
| `ClearPass::certificateAuthority()->rejectCertificate(...)` | `Certificate` or null |
| `ClearPass::certificateAuthority()->requestCertificate(...)` | `Certificate` or null |
| `ClearPass::certificateAuthority()->revokeCertificate(...)` | `Certificate` or null |
| `ClearPass::certificateAuthority()->signCertificate(...)` | `Certificate` or null |

| Request | Method | Path | Returns |
|---|---|---|---|
| `CertificateAuthority\Certificate\GetCertificatesRequest` | GET | `/certificate` | Collection of `Certificate` |
| `CertificateAuthority\Certificate\GetCertificateRequest` | GET | `/certificate/{certificate_id}` | `Certificate` or null |
| `CertificateAuthority\Certificate\DeleteCertificateRequest` | DELETE | `/certificate/{certificate_id}` | null |
| `CertificateAuthority\CertificateChain\GetCertificateChainRequest` | GET | `/certificate/{cert_id}/chain` | `CertificateChain` or null |
| `CertificateAuthority\CertificateExport\ExportCertificateRequest` | POST | `/certificate/{cert_id}/export` | `CertificateExportResponse` or null |
| `CertificateAuthority\CertificateImport\ImportCertificateRequest` | POST | `/certificate/import` | `Certificate` or null |
| `CertificateAuthority\CertificateNew\CreateCertificateRequest` | POST | `/certificate/new` | `Certificate` or null |
| `CertificateAuthority\CertificateReject\RejectCertificateRequest` | POST | `/certificate/{cert_id}/reject` | `Certificate` or null |
| `CertificateAuthority\CertificateRequest\RequestCertificateRequest` | POST | `/certificate/request` | `Certificate` or null |
| `CertificateAuthority\CertificateRevoke\RevokeCertificateRequest` | POST | `/certificate/{cert_id}/revoke` | `Certificate` or null |
| `CertificateAuthority\CertificateSignRequest\SignCertificateRequest` | POST | `/certificate/{cert_id}/sign` | `Certificate` or null |
| `CertificateAuthority\OnboardDevice\GetOnboardDevicesRequest` | GET | `/onboard/device` | Collection of `OnboardDevice` |
| `CertificateAuthority\OnboardDevice\GetOnboardDeviceRequest` | GET | `/onboard/device/{id}` | `OnboardDevice` or null |
| `CertificateAuthority\OnboardDevice\UpdateOnboardDeviceRequest` | PATCH | `/onboard/device/{id}` | `OnboardDevice` or null |
| `CertificateAuthority\OnboardDevice\DeleteOnboardDeviceRequest` | DELETE | `/onboard/device/{id}` | null |
| `CertificateAuthority\OnboardUser\GetOnboardUsersRequest` | GET | `/user` | Collection of `OnboardUser` |
| `CertificateAuthority\OnboardUser\GetOnboardUserRequest` | GET | `/user/{id}` | `OnboardUser` or null |
| `CertificateAuthority\OnboardUser\UpdateOnboardUserRequest` | PATCH | `/user/{id}` | `OnboardUser` or null |
| `CertificateAuthority\OnboardUser\DeleteOnboardUserRequest` | DELETE | `/user/{id}` | null |

## EndpointVisibility

`ClearPass::endpointVisibility()`

| Call | Returns |
|---|---|
| `ClearPass::endpointVisibility()->agentlessOnGuardSettings()` | a builder over `AgentlessOnGuardSettings` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::endpointVisibility()->agentlessOnGuardSubnetMappings()` | a builder over `AgentlessOnGuardSubnetMapping` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)`, `enable(...)`, `disable(...)`, `enableByName(...)`, `disableByName(...)` |
| `ClearPass::endpointVisibility()->deviceFingerprint()` | methods: `create(...)`, `findByMacOrIp(...)`, `deleteByMacOrIp(...)` |
| `ClearPass::endpointVisibility()->fingerprintDictionaries()` | a builder over `FingerprintDictionary` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::endpointVisibility()->networkScans()` | a builder over `NetworkScan` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `enable(...)`, `disable(...)` |
| `ClearPass::endpointVisibility()->onGuardActivities()` | a builder over `OnGuardActivity` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `findByHostMac(...)`, `createMessage(...)`, `createNotification(...)` |
| `ClearPass::endpointVisibility()->onGuardCustomScripts()` | a builder over `OnGuardCustomScript` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::endpointVisibility()->onGuardGlobalSettings()` | the setting as `OnGuardGlobalSettings`: `get()`, `create()` |
| `ClearPass::endpointVisibility()->onGuardSettings()` | the setting as `OnGuardSettings`: `get()`, `create()` |
| `ClearPass::endpointVisibility()->onGuardZoneMappings()` | a builder over `OnGuardZoneMapping` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::endpointVisibility()->profilerSubnetMappings()` | a builder over `ProfilerSubnetMapping` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `findByScanType(...)`, `updateByScanType(...)`, `replaceByScanType(...)`, `deleteByScanType(...)`, `findByNetwork(...)`, `updateByNetwork(...)`, `replaceByNetwork(...)`, `deleteByNetwork(...)` |
| `ClearPass::endpointVisibility()->windowsHotfixes()` | a builder over `WindowsHotfix` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByKbidAndOperatingSystem(...)`, `updateByKbidAndOperatingSystem(...)`, `replaceByKbidAndOperatingSystem(...)`, `deleteByKbidAndOperatingSystem(...)` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `EndpointVisibility\AgentlessOnGuardSettings\GetAllAgentlessOnGuardSettingsRequest` | GET | `/agentless-onguard/settings` | Collection of `AgentlessOnGuardSettings` |
| `EndpointVisibility\AgentlessOnGuardSettings\CreateAgentlessOnGuardSettingsRequest` | POST | `/agentless-onguard/settings` | `AgentlessOnGuardSettings` or null |
| `EndpointVisibility\AgentlessOnGuardSettings\GetAgentlessOnGuardSettingsRequest` | GET | `/agentless-onguard/settings/{settings_id}` | `AgentlessOnGuardSettings` or null |
| `EndpointVisibility\AgentlessOnGuardSettings\UpdateAgentlessOnGuardSettingsRequest` | PATCH | `/agentless-onguard/settings/{settings_id}` | `AgentlessOnGuardSettings` or null |
| `EndpointVisibility\AgentlessOnGuardSettings\ReplaceAgentlessOnGuardSettingsRequest` | PUT | `/agentless-onguard/settings/{settings_id}` | `AgentlessOnGuardSettings` or null |
| `EndpointVisibility\AgentlessOnGuardSettings\DeleteAgentlessOnGuardSettingsRequest` | DELETE | `/agentless-onguard/settings/{settings_id}` | null |
| `EndpointVisibility\AgentlessOnGuardSettings\GetAgentlessOnGuardSettingsByNameRequest` | GET | `/agentless-onguard/settings/name/{name}` | `AgentlessOnGuardSettings` or null |
| `EndpointVisibility\AgentlessOnGuardSettings\UpdateAgentlessOnGuardSettingsByNameRequest` | PATCH | `/agentless-onguard/settings/name/{name}` | `AgentlessOnGuardSettings` or null |
| `EndpointVisibility\AgentlessOnGuardSettings\ReplaceAgentlessOnGuardSettingsByNameRequest` | PUT | `/agentless-onguard/settings/name/{name}` | `AgentlessOnGuardSettings` or null |
| `EndpointVisibility\AgentlessOnGuardSettings\DeleteAgentlessOnGuardSettingsByNameRequest` | DELETE | `/agentless-onguard/settings/name/{name}` | null |
| `EndpointVisibility\AgentlessOnGuardSubnetMapping\GetAgentlessOnGuardSubnetMappingsRequest` | GET | `/agentless-onguard/subnet-mapping` | Collection of `AgentlessOnGuardSubnetMapping` |
| `EndpointVisibility\AgentlessOnGuardSubnetMapping\CreateAgentlessOnGuardSubnetMappingRequest` | POST | `/agentless-onguard/subnet-mapping` | `AgentlessOnGuardSubnetMapping` or null |
| `EndpointVisibility\AgentlessOnGuardSubnetMapping\GetAgentlessOnGuardSubnetMappingRequest` | GET | `/agentless-onguard/subnet-mapping/{subnet_mapping_id}` | `AgentlessOnGuardSubnetMapping` or null |
| `EndpointVisibility\AgentlessOnGuardSubnetMapping\UpdateAgentlessOnGuardSubnetMappingRequest` | PATCH | `/agentless-onguard/subnet-mapping/{subnet_mapping_id}` | `AgentlessOnGuardSubnetMapping` or null |
| `EndpointVisibility\AgentlessOnGuardSubnetMapping\ReplaceAgentlessOnGuardSubnetMappingRequest` | PUT | `/agentless-onguard/subnet-mapping/{subnet_mapping_id}` | `AgentlessOnGuardSubnetMapping` or null |
| `EndpointVisibility\AgentlessOnGuardSubnetMapping\DeleteAgentlessOnGuardSubnetMappingRequest` | DELETE | `/agentless-onguard/subnet-mapping/{subnet_mapping_id}` | null |
| `EndpointVisibility\AgentlessOnGuardSubnetMapping\GetAgentlessOnGuardSubnetMappingByNameRequest` | GET | `/agentless-onguard/subnet-mapping/name/{name}` | `AgentlessOnGuardSubnetMapping` or null |
| `EndpointVisibility\AgentlessOnGuardSubnetMapping\UpdateAgentlessOnGuardSubnetMappingByNameRequest` | PATCH | `/agentless-onguard/subnet-mapping/name/{name}` | `AgentlessOnGuardSubnetMapping` or null |
| `EndpointVisibility\AgentlessOnGuardSubnetMapping\ReplaceAgentlessOnGuardSubnetMappingByNameRequest` | PUT | `/agentless-onguard/subnet-mapping/name/{name}` | `AgentlessOnGuardSubnetMapping` or null |
| `EndpointVisibility\AgentlessOnGuardSubnetMapping\DeleteAgentlessOnGuardSubnetMappingByNameRequest` | DELETE | `/agentless-onguard/subnet-mapping/name/{name}` | null |
| `EndpointVisibility\AgentlessOnGuardSubnetMapping\EnableAgentlessOnGuardSubnetMappingRequest` | PATCH | `/agentless-onguard/subnet-mapping/{subnet_mapping_id}/enable` | `AgentlessOnGuardSubnetMapping` or null |
| `EndpointVisibility\AgentlessOnGuardSubnetMapping\DisableAgentlessOnGuardSubnetMappingRequest` | PATCH | `/agentless-onguard/subnet-mapping/{subnet_mapping_id}/disable` | `AgentlessOnGuardSubnetMapping` or null |
| `EndpointVisibility\AgentlessOnGuardSubnetMapping\EnableAgentlessOnGuardSubnetMappingByNameRequest` | PATCH | `/agentless-onguard/subnet-mapping/name/{name}/enable` | `AgentlessOnGuardSubnetMapping` or null |
| `EndpointVisibility\AgentlessOnGuardSubnetMapping\DisableAgentlessOnGuardSubnetMappingByNameRequest` | PATCH | `/agentless-onguard/subnet-mapping/name/{name}/disable` | `AgentlessOnGuardSubnetMapping` or null |
| `EndpointVisibility\DeviceFingerprint\CreateDeviceFingerprintRequest` | POST | `/device-profiler/device-fingerprint` | `DeviceFingerprint` or null |
| `EndpointVisibility\DeviceFingerprint\GetDeviceFingerprintByMacOrIpRequest` | GET | `/device-profiler/device-fingerprint/{mac_or_ip}` | `DeviceFingerprint` or null |
| `EndpointVisibility\DeviceFingerprint\DeleteDeviceFingerprintByMacOrIpRequest` | DELETE | `/device-profiler/device-fingerprint/{mac_or_ip}` | null |
| `EndpointVisibility\FingerprintDictionary\GetFingerprintDictionariesRequest` | GET | `/fingerprint` | Collection of `FingerprintDictionary` |
| `EndpointVisibility\FingerprintDictionary\CreateFingerprintDictionaryRequest` | POST | `/fingerprint` | `FingerprintDictionary` or null |
| `EndpointVisibility\FingerprintDictionary\GetFingerprintDictionaryRequest` | GET | `/fingerprint/{fingerprint_id}` | `FingerprintDictionary` or null |
| `EndpointVisibility\FingerprintDictionary\UpdateFingerprintDictionaryRequest` | PATCH | `/fingerprint/{fingerprint_id}` | `FingerprintDictionary` or null |
| `EndpointVisibility\FingerprintDictionary\ReplaceFingerprintDictionaryRequest` | PUT | `/fingerprint/{fingerprint_id}` | `FingerprintDictionary` or null |
| `EndpointVisibility\FingerprintDictionary\DeleteFingerprintDictionaryRequest` | DELETE | `/fingerprint/{fingerprint_id}` | null |
| `EndpointVisibility\FingerprintDictionary\GetFingerprintDictionaryByNameRequest` | GET | `/fingerprint/name/{category}/{family}/{name}` | `FingerprintDictionary` or null |
| `EndpointVisibility\FingerprintDictionary\UpdateFingerprintDictionaryByNameRequest` | PATCH | `/fingerprint/name/{category}/{family}/{name}` | `FingerprintDictionary` or null |
| `EndpointVisibility\FingerprintDictionary\ReplaceFingerprintDictionaryByNameRequest` | PUT | `/fingerprint/name/{category}/{family}/{name}` | `FingerprintDictionary` or null |
| `EndpointVisibility\FingerprintDictionary\DeleteFingerprintDictionaryByNameRequest` | DELETE | `/fingerprint/name/{category}/{family}/{name}` | null |
| `EndpointVisibility\NetworkScan\GetNetworkScansRequest` | GET | `/config/network-scan` | Collection of `NetworkScan` |
| `EndpointVisibility\NetworkScan\CreateNetworkScanRequest` | POST | `/config/network-scan` | `NetworkScan` or null |
| `EndpointVisibility\NetworkScan\GetNetworkScanRequest` | GET | `/config/network-scan/{scan_id}` | `NetworkScan` or null |
| `EndpointVisibility\NetworkScan\UpdateNetworkScanRequest` | PATCH | `/config/network-scan/{scan_id}` | `NetworkScan` or null |
| `EndpointVisibility\NetworkScan\ReplaceNetworkScanRequest` | PUT | `/config/network-scan/{scan_id}` | `NetworkScan` or null |
| `EndpointVisibility\NetworkScan\DeleteNetworkScanRequest` | DELETE | `/config/network-scan/{scan_id}` | null |
| `EndpointVisibility\NetworkScan\EnableNetworkScanRequest` | PATCH | `/config/network-scan/{scan_id}/enable` | `NetworkScan` or null |
| `EndpointVisibility\NetworkScan\DisableNetworkScanRequest` | PATCH | `/config/network-scan/{scan_id}/disable` | `NetworkScan` or null |
| `EndpointVisibility\OnGuardActivity\GetOnGuardActivitiesRequest` | GET | `/onguard-activity` | Collection of `OnGuardActivity` |
| `EndpointVisibility\OnGuardActivity\GetOnGuardActivityRequest` | GET | `/onguard-activity/{onguard_activity_id}` | `OnGuardActivity` or null |
| `EndpointVisibility\OnGuardActivity\GetOnGuardActivityByHostMacRequest` | GET | `/onguard-activity/host_mac/{host_mac}` | `OnGuardActivity` or null |
| `EndpointVisibility\OnGuardActivity\CreateOnGuardActivityMessageRequest` | POST | `/onguard-activity/message` | `OnGuardActivityResponse` or null |
| `EndpointVisibility\OnGuardActivity\CreateOnGuardActivityNotificationRequest` | POST | `/onguard-activity/notification` | `OnGuardActivityResponse` or null |
| `EndpointVisibility\OnGuardCustomScript\GetOnGuardCustomScriptsRequest` | GET | `/onguard-custom-script` | Collection of `OnGuardCustomScript` |
| `EndpointVisibility\OnGuardCustomScript\CreateOnGuardCustomScriptRequest` | POST | `/onguard-custom-script` | `OnGuardCustomScript` or null |
| `EndpointVisibility\OnGuardCustomScript\GetOnGuardCustomScriptRequest` | GET | `/onguard-custom-script/{onguard_custom_script_id}` | `OnGuardCustomScript` or null |
| `EndpointVisibility\OnGuardCustomScript\UpdateOnGuardCustomScriptRequest` | PATCH | `/onguard-custom-script/{onguard_custom_script_id}` | `OnGuardCustomScript` or null |
| `EndpointVisibility\OnGuardCustomScript\ReplaceOnGuardCustomScriptRequest` | PUT | `/onguard-custom-script/{onguard_custom_script_id}` | `OnGuardCustomScript` or null |
| `EndpointVisibility\OnGuardCustomScript\DeleteOnGuardCustomScriptRequest` | DELETE | `/onguard-custom-script/{onguard_custom_script_id}` | null |
| `EndpointVisibility\OnGuardCustomScript\GetOnGuardCustomScriptByNameRequest` | GET | `/onguard-custom-script/name/{name}` | `OnGuardCustomScript` or null |
| `EndpointVisibility\OnGuardCustomScript\UpdateOnGuardCustomScriptByNameRequest` | PATCH | `/onguard-custom-script/name/{name}` | `OnGuardCustomScript` or null |
| `EndpointVisibility\OnGuardCustomScript\ReplaceOnGuardCustomScriptByNameRequest` | PUT | `/onguard-custom-script/name/{name}` | `OnGuardCustomScript` or null |
| `EndpointVisibility\OnGuardCustomScript\DeleteOnGuardCustomScriptByNameRequest` | DELETE | `/onguard-custom-script/name/{name}` | null |
| `EndpointVisibility\OnGuardGlobalSettings\GetOnGuardGlobalSettingsRequest` | GET | `/onguard/global-settings` | `OnGuardGlobalSettings` or null |
| `EndpointVisibility\OnGuardGlobalSettings\CreateOnGuardGlobalSettingsRequest` | POST | `/onguard/global-settings` | `OnGuardGlobalSettings` or null |
| `EndpointVisibility\OnGuardSettings\GetOnGuardSettingsRequest` | GET | `/onguard/settings` | `OnGuardSettings` or null |
| `EndpointVisibility\OnGuardSettings\CreateOnGuardSettingsRequest` | POST | `/onguard/settings` | `OnGuardSettings` or null |
| `EndpointVisibility\OnGuardZoneMapping\GetOnGuardZoneMappingsRequest` | GET | `/onguard/policy-manager-zones` | Collection of `OnGuardZoneMapping` |
| `EndpointVisibility\OnGuardZoneMapping\CreateOnGuardZoneMappingRequest` | POST | `/onguard/policy-manager-zones` | `OnGuardZoneMapping` or null |
| `EndpointVisibility\OnGuardZoneMapping\GetOnGuardZoneMappingRequest` | GET | `/onguard/policy-manager-zones/{policy_manager_zones_id}` | `OnGuardZoneMapping` or null |
| `EndpointVisibility\OnGuardZoneMapping\UpdateOnGuardZoneMappingRequest` | PATCH | `/onguard/policy-manager-zones/{policy_manager_zones_id}` | `OnGuardZoneMapping` or null |
| `EndpointVisibility\OnGuardZoneMapping\ReplaceOnGuardZoneMappingRequest` | PUT | `/onguard/policy-manager-zones/{policy_manager_zones_id}` | `OnGuardZoneMapping` or null |
| `EndpointVisibility\OnGuardZoneMapping\DeleteOnGuardZoneMappingRequest` | DELETE | `/onguard/policy-manager-zones/{policy_manager_zones_id}` | null |
| `EndpointVisibility\OnGuardZoneMapping\GetOnGuardZoneMappingByNameRequest` | GET | `/onguard/policy-manager-zones/name/{name}` | `OnGuardZoneMapping` or null |
| `EndpointVisibility\OnGuardZoneMapping\UpdateOnGuardZoneMappingByNameRequest` | PATCH | `/onguard/policy-manager-zones/name/{name}` | `OnGuardZoneMapping` or null |
| `EndpointVisibility\OnGuardZoneMapping\ReplaceOnGuardZoneMappingByNameRequest` | PUT | `/onguard/policy-manager-zones/name/{name}` | `OnGuardZoneMapping` or null |
| `EndpointVisibility\OnGuardZoneMapping\DeleteOnGuardZoneMappingByNameRequest` | DELETE | `/onguard/policy-manager-zones/name/{name}` | null |
| `EndpointVisibility\ProfilerSubnetMapping\GetProfilerSubnetMappingsRequest` | GET | `/profiler-subnet-mapping` | Collection of `ProfilerSubnetMapping` |
| `EndpointVisibility\ProfilerSubnetMapping\CreateProfilerSubnetMappingRequest` | POST | `/profiler-subnet-mapping` | `ProfilerSubnetMapping` or null |
| `EndpointVisibility\ProfilerSubnetMapping\GetProfilerSubnetMappingByScanTypeRequest` | GET | `/profiler-subnet-mapping/{scan_type}/{profiler_subnet_mapping_id}` | `ProfilerSubnetMapping` or null |
| `EndpointVisibility\ProfilerSubnetMapping\UpdateProfilerSubnetMappingByScanTypeRequest` | PATCH | `/profiler-subnet-mapping/{scan_type}/{profiler_subnet_mapping_id}` | `ProfilerSubnetMapping` or null |
| `EndpointVisibility\ProfilerSubnetMapping\ReplaceProfilerSubnetMappingByScanTypeRequest` | PUT | `/profiler-subnet-mapping/{scan_type}/{profiler_subnet_mapping_id}` | `ProfilerSubnetMapping` or null |
| `EndpointVisibility\ProfilerSubnetMapping\DeleteProfilerSubnetMappingByScanTypeRequest` | DELETE | `/profiler-subnet-mapping/{scan_type}/{profiler_subnet_mapping_id}` | null |
| `EndpointVisibility\ProfilerSubnetMapping\GetProfilerSubnetMappingByNetworkRequest` | GET | `/profiler-subnet-mapping/{scan_type}/network/{network}` | `ProfilerSubnetMapping` or null |
| `EndpointVisibility\ProfilerSubnetMapping\UpdateProfilerSubnetMappingByNetworkRequest` | PATCH | `/profiler-subnet-mapping/{scan_type}/network/{network}` | `ProfilerSubnetMapping` or null |
| `EndpointVisibility\ProfilerSubnetMapping\ReplaceProfilerSubnetMappingByNetworkRequest` | PUT | `/profiler-subnet-mapping/{scan_type}/network/{network}` | `ProfilerSubnetMapping` or null |
| `EndpointVisibility\ProfilerSubnetMapping\DeleteProfilerSubnetMappingByNetworkRequest` | DELETE | `/profiler-subnet-mapping/{scan_type}/network/{network}` | null |
| `EndpointVisibility\WindowsHotfix\GetWindowsHotfixesRequest` | GET | `/windows-hotfix` | Collection of `WindowsHotfix` |
| `EndpointVisibility\WindowsHotfix\CreateWindowsHotfixRequest` | POST | `/windows-hotfix` | `WindowsHotfix` or null |
| `EndpointVisibility\WindowsHotfix\GetWindowsHotfixRequest` | GET | `/windows-hotfix/{windows_hotfix_id}` | `WindowsHotfix` or null |
| `EndpointVisibility\WindowsHotfix\UpdateWindowsHotfixRequest` | PATCH | `/windows-hotfix/{windows_hotfix_id}` | `WindowsHotfix` or null |
| `EndpointVisibility\WindowsHotfix\ReplaceWindowsHotfixRequest` | PUT | `/windows-hotfix/{windows_hotfix_id}` | `WindowsHotfix` or null |
| `EndpointVisibility\WindowsHotfix\DeleteWindowsHotfixRequest` | DELETE | `/windows-hotfix/{windows_hotfix_id}` | null |
| `EndpointVisibility\WindowsHotfix\GetWindowsHotfixByKbidAndOperatingSystemRequest` | GET | `/windows-hotfix/kbid/{kbid}/operating_system/{operating_system}` | `WindowsHotfix` or null |
| `EndpointVisibility\WindowsHotfix\UpdateWindowsHotfixByKbidAndOperatingSystemRequest` | PATCH | `/windows-hotfix/kbid/{kbid}/operating_system/{operating_system}` | `WindowsHotfix` or null |
| `EndpointVisibility\WindowsHotfix\ReplaceWindowsHotfixByKbidAndOperatingSystemRequest` | PUT | `/windows-hotfix/kbid/{kbid}/operating_system/{operating_system}` | `WindowsHotfix` or null |
| `EndpointVisibility\WindowsHotfix\DeleteWindowsHotfixByKbidAndOperatingSystemRequest` | DELETE | `/windows-hotfix/kbid/{kbid}/operating_system/{operating_system}` | null |

## EnforcementProfile

`ClearPass::enforcementProfile()`

| Call | Returns |
|---|---|
| `ClearPass::enforcementProfile()->captivePortalProfiles(...)` | a builder over `CaptivePortalProfile` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::enforcementProfile()->durClasses(...)` | a builder over `DURClass` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::enforcementProfile()->enforcementProfiles()` | a builder over `EnforcementProfile` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::enforcementProfile()->ethertypeAccessControlLists(...)` | a builder over `EthertypeAccessControlList` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::enforcementProfile()->macAccessControlLists(...)` | a builder over `MACAccessControlList` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::enforcementProfile()->natPools(...)` | a builder over `NATPool` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::enforcementProfile()->netDestinations(...)` | a builder over `NetDestination` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::enforcementProfile()->netServices(...)` | a builder over `NetService` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::enforcementProfile()->policerProfiles(...)` | a builder over `PolicerProfile` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::enforcementProfile()->policies(...)` | a builder over `Policy` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::enforcementProfile()->qosProfiles(...)` | a builder over `QoSProfile` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::enforcementProfile()->sessionAccessControlLists(...)` | a builder over `SessionAccessControlList` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::enforcementProfile()->statelessAccessControlLists(...)` | a builder over `StatelessAccessControlList` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::enforcementProfile()->timeRanges(...)` | a builder over `TimeRange` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::enforcementProfile()->voipProfiles(...)` | a builder over `VoIPProfile` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `EnforcementProfile\CaptivePortalProfile\GetCaptivePortalProfilesRequest` | GET | `/enforcement-profile-dur/captive-portal-profile/{product_name}` | Collection of `CaptivePortalProfile` |
| `EnforcementProfile\CaptivePortalProfile\CreateCaptivePortalProfileRequest` | POST | `/enforcement-profile-dur/captive-portal-profile/{product_name}` | `CaptivePortalProfile` or null |
| `EnforcementProfile\CaptivePortalProfile\GetCaptivePortalProfileRequest` | GET | `/enforcement-profile-dur/captive-portal-profile/{product_name}/{captive_portal_profile_id}` | `CaptivePortalProfile` or null |
| `EnforcementProfile\CaptivePortalProfile\UpdateCaptivePortalProfileRequest` | PATCH | `/enforcement-profile-dur/captive-portal-profile/{product_name}/{captive_portal_profile_id}` | `CaptivePortalProfile` or null |
| `EnforcementProfile\CaptivePortalProfile\ReplaceCaptivePortalProfileRequest` | PUT | `/enforcement-profile-dur/captive-portal-profile/{product_name}/{captive_portal_profile_id}` | `CaptivePortalProfile` or null |
| `EnforcementProfile\CaptivePortalProfile\DeleteCaptivePortalProfileRequest` | DELETE | `/enforcement-profile-dur/captive-portal-profile/{product_name}/{captive_portal_profile_id}` | null |
| `EnforcementProfile\CaptivePortalProfile\GetCaptivePortalProfileByNameRequest` | GET | `/enforcement-profile-dur/captive-portal-profile/{product_name}/name/{name}` | `CaptivePortalProfile` or null |
| `EnforcementProfile\CaptivePortalProfile\UpdateCaptivePortalProfileByNameRequest` | PATCH | `/enforcement-profile-dur/captive-portal-profile/{product_name}/name/{name}` | `CaptivePortalProfile` or null |
| `EnforcementProfile\CaptivePortalProfile\ReplaceCaptivePortalProfileByNameRequest` | PUT | `/enforcement-profile-dur/captive-portal-profile/{product_name}/name/{name}` | `CaptivePortalProfile` or null |
| `EnforcementProfile\CaptivePortalProfile\DeleteCaptivePortalProfileByNameRequest` | DELETE | `/enforcement-profile-dur/captive-portal-profile/{product_name}/name/{name}` | null |
| `EnforcementProfile\DURClass\GetDURClassesRequest` | GET | `/enforcement-profile-dur/dur-class/{product_name}` | Collection of `DURClass` |
| `EnforcementProfile\DURClass\CreateDURClassRequest` | POST | `/enforcement-profile-dur/dur-class/{product_name}` | `DURClass` or null |
| `EnforcementProfile\DURClass\GetDURClassRequest` | GET | `/enforcement-profile-dur/dur-class/{product_name}/{dur_class_id}` | `DURClass` or null |
| `EnforcementProfile\DURClass\UpdateDURClassRequest` | PATCH | `/enforcement-profile-dur/dur-class/{product_name}/{dur_class_id}` | `DURClass` or null |
| `EnforcementProfile\DURClass\ReplaceDURClassRequest` | PUT | `/enforcement-profile-dur/dur-class/{product_name}/{dur_class_id}` | `DURClass` or null |
| `EnforcementProfile\DURClass\DeleteDURClassRequest` | DELETE | `/enforcement-profile-dur/dur-class/{product_name}/{dur_class_id}` | null |
| `EnforcementProfile\DURClass\GetDURClassByNameRequest` | GET | `/enforcement-profile-dur/dur-class/{product_name}/name/{name}` | `DURClass` or null |
| `EnforcementProfile\DURClass\UpdateDURClassByNameRequest` | PATCH | `/enforcement-profile-dur/dur-class/{product_name}/name/{name}` | `DURClass` or null |
| `EnforcementProfile\DURClass\ReplaceDURClassByNameRequest` | PUT | `/enforcement-profile-dur/dur-class/{product_name}/name/{name}` | `DURClass` or null |
| `EnforcementProfile\DURClass\DeleteDURClassByNameRequest` | DELETE | `/enforcement-profile-dur/dur-class/{product_name}/name/{name}` | null |
| `EnforcementProfile\EnforcementProfile\GetEnforcementProfilesRequest` | GET | `/enforcement-profile` | Collection of `EnforcementProfile` |
| `EnforcementProfile\EnforcementProfile\CreateEnforcementProfileRequest` | POST | `/enforcement-profile` | `EnforcementProfile` or null |
| `EnforcementProfile\EnforcementProfile\GetEnforcementProfileRequest` | GET | `/enforcement-profile/{enforcement_profile_id}` | `EnforcementProfile` or null |
| `EnforcementProfile\EnforcementProfile\UpdateEnforcementProfileRequest` | PATCH | `/enforcement-profile/{enforcement_profile_id}` | `EnforcementProfile` or null |
| `EnforcementProfile\EnforcementProfile\ReplaceEnforcementProfileRequest` | PUT | `/enforcement-profile/{enforcement_profile_id}` | `EnforcementProfile` or null |
| `EnforcementProfile\EnforcementProfile\DeleteEnforcementProfileRequest` | DELETE | `/enforcement-profile/{enforcement_profile_id}` | null |
| `EnforcementProfile\EnforcementProfile\GetEnforcementProfileByNameRequest` | GET | `/enforcement-profile/name/{name}` | `EnforcementProfile` or null |
| `EnforcementProfile\EnforcementProfile\UpdateEnforcementProfileByNameRequest` | PATCH | `/enforcement-profile/name/{name}` | `EnforcementProfile` or null |
| `EnforcementProfile\EnforcementProfile\ReplaceEnforcementProfileByNameRequest` | PUT | `/enforcement-profile/name/{name}` | `EnforcementProfile` or null |
| `EnforcementProfile\EnforcementProfile\DeleteEnforcementProfileByNameRequest` | DELETE | `/enforcement-profile/name/{name}` | null |
| `EnforcementProfile\EthertypeAccessControlList\GetEthertypeAccessControlListsRequest` | GET | `/enforcement-profile-dur/ethertype-access-control-list/{product_name}` | Collection of `EthertypeAccessControlList` |
| `EnforcementProfile\EthertypeAccessControlList\CreateEthertypeAccessControlListRequest` | POST | `/enforcement-profile-dur/ethertype-access-control-list/{product_name}` | `EthertypeAccessControlList` or null |
| `EnforcementProfile\EthertypeAccessControlList\GetEthertypeAccessControlListRequest` | GET | `/enforcement-profile-dur/ethertype-access-control-list/{product_name}/{ethertype_access_control_list_id}` | `EthertypeAccessControlList` or null |
| `EnforcementProfile\EthertypeAccessControlList\UpdateEthertypeAccessControlListRequest` | PATCH | `/enforcement-profile-dur/ethertype-access-control-list/{product_name}/{ethertype_access_control_list_id}` | `EthertypeAccessControlList` or null |
| `EnforcementProfile\EthertypeAccessControlList\ReplaceEthertypeAccessControlListRequest` | PUT | `/enforcement-profile-dur/ethertype-access-control-list/{product_name}/{ethertype_access_control_list_id}` | `EthertypeAccessControlList` or null |
| `EnforcementProfile\EthertypeAccessControlList\DeleteEthertypeAccessControlListRequest` | DELETE | `/enforcement-profile-dur/ethertype-access-control-list/{product_name}/{ethertype_access_control_list_id}` | null |
| `EnforcementProfile\EthertypeAccessControlList\GetEthertypeAccessControlListByNameRequest` | GET | `/enforcement-profile-dur/ethertype-access-control-list/{product_name}/name/{name}` | `EthertypeAccessControlList` or null |
| `EnforcementProfile\EthertypeAccessControlList\UpdateEthertypeAccessControlListByNameRequest` | PATCH | `/enforcement-profile-dur/ethertype-access-control-list/{product_name}/name/{name}` | `EthertypeAccessControlList` or null |
| `EnforcementProfile\EthertypeAccessControlList\ReplaceEthertypeAccessControlListByNameRequest` | PUT | `/enforcement-profile-dur/ethertype-access-control-list/{product_name}/name/{name}` | `EthertypeAccessControlList` or null |
| `EnforcementProfile\EthertypeAccessControlList\DeleteEthertypeAccessControlListByNameRequest` | DELETE | `/enforcement-profile-dur/ethertype-access-control-list/{product_name}/name/{name}` | null |
| `EnforcementProfile\MACAccessControlList\GetMACAccessControlListsRequest` | GET | `/enforcement-profile-dur/mac-access-control-list/{product_name}` | Collection of `MACAccessControlList` |
| `EnforcementProfile\MACAccessControlList\CreateMACAccessControlListRequest` | POST | `/enforcement-profile-dur/mac-access-control-list/{product_name}` | `MACAccessControlList` or null |
| `EnforcementProfile\MACAccessControlList\GetMACAccessControlListRequest` | GET | `/enforcement-profile-dur/mac-access-control-list/{product_name}/{mac_access_control_list_id}` | `MACAccessControlList` or null |
| `EnforcementProfile\MACAccessControlList\UpdateMACAccessControlListRequest` | PATCH | `/enforcement-profile-dur/mac-access-control-list/{product_name}/{mac_access_control_list_id}` | `MACAccessControlList` or null |
| `EnforcementProfile\MACAccessControlList\ReplaceMACAccessControlListRequest` | PUT | `/enforcement-profile-dur/mac-access-control-list/{product_name}/{mac_access_control_list_id}` | `MACAccessControlList` or null |
| `EnforcementProfile\MACAccessControlList\DeleteMACAccessControlListRequest` | DELETE | `/enforcement-profile-dur/mac-access-control-list/{product_name}/{mac_access_control_list_id}` | null |
| `EnforcementProfile\MACAccessControlList\GetMACAccessControlListByNameRequest` | GET | `/enforcement-profile-dur/mac-access-control-list/{product_name}/name/{name}` | `MACAccessControlList` or null |
| `EnforcementProfile\MACAccessControlList\UpdateMACAccessControlListByNameRequest` | PATCH | `/enforcement-profile-dur/mac-access-control-list/{product_name}/name/{name}` | `MACAccessControlList` or null |
| `EnforcementProfile\MACAccessControlList\ReplaceMACAccessControlListByNameRequest` | PUT | `/enforcement-profile-dur/mac-access-control-list/{product_name}/name/{name}` | `MACAccessControlList` or null |
| `EnforcementProfile\MACAccessControlList\DeleteMACAccessControlListByNameRequest` | DELETE | `/enforcement-profile-dur/mac-access-control-list/{product_name}/name/{name}` | null |
| `EnforcementProfile\NATPool\GetNATPoolsRequest` | GET | `/enforcement-profile-dur/nat-pool/{product_name}` | Collection of `NATPool` |
| `EnforcementProfile\NATPool\CreateNATPoolRequest` | POST | `/enforcement-profile-dur/nat-pool/{product_name}` | `NATPool` or null |
| `EnforcementProfile\NATPool\GetNATPoolRequest` | GET | `/enforcement-profile-dur/nat-pool/{product_name}/{nat_pool_id}` | `NATPool` or null |
| `EnforcementProfile\NATPool\UpdateNATPoolRequest` | PATCH | `/enforcement-profile-dur/nat-pool/{product_name}/{nat_pool_id}` | `NATPool` or null |
| `EnforcementProfile\NATPool\ReplaceNATPoolRequest` | PUT | `/enforcement-profile-dur/nat-pool/{product_name}/{nat_pool_id}` | `NATPool` or null |
| `EnforcementProfile\NATPool\DeleteNATPoolRequest` | DELETE | `/enforcement-profile-dur/nat-pool/{product_name}/{nat_pool_id}` | null |
| `EnforcementProfile\NATPool\GetNATPoolByNameRequest` | GET | `/enforcement-profile-dur/nat-pool/{product_name}/name/{name}` | `NATPool` or null |
| `EnforcementProfile\NATPool\UpdateNATPoolByNameRequest` | PATCH | `/enforcement-profile-dur/nat-pool/{product_name}/name/{name}` | `NATPool` or null |
| `EnforcementProfile\NATPool\ReplaceNATPoolByNameRequest` | PUT | `/enforcement-profile-dur/nat-pool/{product_name}/name/{name}` | `NATPool` or null |
| `EnforcementProfile\NATPool\DeleteNATPoolByNameRequest` | DELETE | `/enforcement-profile-dur/nat-pool/{product_name}/name/{name}` | null |
| `EnforcementProfile\NetDestination\GetNetDestinationsRequest` | GET | `/enforcement-profile-dur/net-destination/{product_name}` | Collection of `NetDestination` |
| `EnforcementProfile\NetDestination\CreateNetDestinationRequest` | POST | `/enforcement-profile-dur/net-destination/{product_name}` | `NetDestination` or null |
| `EnforcementProfile\NetDestination\GetNetDestinationRequest` | GET | `/enforcement-profile-dur/net-destination/{product_name}/{net_destination_id}` | `NetDestination` or null |
| `EnforcementProfile\NetDestination\UpdateNetDestinationRequest` | PATCH | `/enforcement-profile-dur/net-destination/{product_name}/{net_destination_id}` | `NetDestination` or null |
| `EnforcementProfile\NetDestination\ReplaceNetDestinationRequest` | PUT | `/enforcement-profile-dur/net-destination/{product_name}/{net_destination_id}` | `NetDestination` or null |
| `EnforcementProfile\NetDestination\DeleteNetDestinationRequest` | DELETE | `/enforcement-profile-dur/net-destination/{product_name}/{net_destination_id}` | null |
| `EnforcementProfile\NetDestination\GetNetDestinationByNameRequest` | GET | `/enforcement-profile-dur/net-destination/{product_name}/name/{name}` | `NetDestination` or null |
| `EnforcementProfile\NetDestination\UpdateNetDestinationByNameRequest` | PATCH | `/enforcement-profile-dur/net-destination/{product_name}/name/{name}` | `NetDestination` or null |
| `EnforcementProfile\NetDestination\ReplaceNetDestinationByNameRequest` | PUT | `/enforcement-profile-dur/net-destination/{product_name}/name/{name}` | `NetDestination` or null |
| `EnforcementProfile\NetDestination\DeleteNetDestinationByNameRequest` | DELETE | `/enforcement-profile-dur/net-destination/{product_name}/name/{name}` | null |
| `EnforcementProfile\NetService\GetNetServicesRequest` | GET | `/enforcement-profile-dur/net-service/{product_name}` | Collection of `NetService` |
| `EnforcementProfile\NetService\CreateNetServiceRequest` | POST | `/enforcement-profile-dur/net-service/{product_name}` | `NetService` or null |
| `EnforcementProfile\NetService\GetNetServiceRequest` | GET | `/enforcement-profile-dur/net-service/{product_name}/{net_service_id}` | `NetService` or null |
| `EnforcementProfile\NetService\UpdateNetServiceRequest` | PATCH | `/enforcement-profile-dur/net-service/{product_name}/{net_service_id}` | `NetService` or null |
| `EnforcementProfile\NetService\ReplaceNetServiceRequest` | PUT | `/enforcement-profile-dur/net-service/{product_name}/{net_service_id}` | `NetService` or null |
| `EnforcementProfile\NetService\DeleteNetServiceRequest` | DELETE | `/enforcement-profile-dur/net-service/{product_name}/{net_service_id}` | null |
| `EnforcementProfile\NetService\GetNetServiceByNameRequest` | GET | `/enforcement-profile-dur/net-service/{product_name}/name/{name}` | `NetService` or null |
| `EnforcementProfile\NetService\UpdateNetServiceByNameRequest` | PATCH | `/enforcement-profile-dur/net-service/{product_name}/name/{name}` | `NetService` or null |
| `EnforcementProfile\NetService\ReplaceNetServiceByNameRequest` | PUT | `/enforcement-profile-dur/net-service/{product_name}/name/{name}` | `NetService` or null |
| `EnforcementProfile\NetService\DeleteNetServiceByNameRequest` | DELETE | `/enforcement-profile-dur/net-service/{product_name}/name/{name}` | null |
| `EnforcementProfile\PolicerProfile\GetPolicerProfilesRequest` | GET | `/enforcement-profile-dur/policer-profile/{product_name}` | Collection of `PolicerProfile` |
| `EnforcementProfile\PolicerProfile\CreatePolicerProfileRequest` | POST | `/enforcement-profile-dur/policer-profile/{product_name}` | `PolicerProfile` or null |
| `EnforcementProfile\PolicerProfile\GetPolicerProfileRequest` | GET | `/enforcement-profile-dur/policer-profile/{product_name}/{policer_profile_id}` | `PolicerProfile` or null |
| `EnforcementProfile\PolicerProfile\UpdatePolicerProfileRequest` | PATCH | `/enforcement-profile-dur/policer-profile/{product_name}/{policer_profile_id}` | `PolicerProfile` or null |
| `EnforcementProfile\PolicerProfile\ReplacePolicerProfileRequest` | PUT | `/enforcement-profile-dur/policer-profile/{product_name}/{policer_profile_id}` | `PolicerProfile` or null |
| `EnforcementProfile\PolicerProfile\DeletePolicerProfileRequest` | DELETE | `/enforcement-profile-dur/policer-profile/{product_name}/{policer_profile_id}` | null |
| `EnforcementProfile\PolicerProfile\GetPolicerProfileByNameRequest` | GET | `/enforcement-profile-dur/policer-profile/{product_name}/name/{name}` | `PolicerProfile` or null |
| `EnforcementProfile\PolicerProfile\UpdatePolicerProfileByNameRequest` | PATCH | `/enforcement-profile-dur/policer-profile/{product_name}/name/{name}` | `PolicerProfile` or null |
| `EnforcementProfile\PolicerProfile\ReplacePolicerProfileByNameRequest` | PUT | `/enforcement-profile-dur/policer-profile/{product_name}/name/{name}` | `PolicerProfile` or null |
| `EnforcementProfile\PolicerProfile\DeletePolicerProfileByNameRequest` | DELETE | `/enforcement-profile-dur/policer-profile/{product_name}/name/{name}` | null |
| `EnforcementProfile\Policy\GetPoliciesRequest` | GET | `/enforcement-profile-dur/policy/{product_name}` | Collection of `Policy` |
| `EnforcementProfile\Policy\CreatePolicyRequest` | POST | `/enforcement-profile-dur/policy/{product_name}` | `Policy` or null |
| `EnforcementProfile\Policy\GetPolicyRequest` | GET | `/enforcement-profile-dur/policy/{product_name}/{policy_id}` | `Policy` or null |
| `EnforcementProfile\Policy\UpdatePolicyRequest` | PATCH | `/enforcement-profile-dur/policy/{product_name}/{policy_id}` | `Policy` or null |
| `EnforcementProfile\Policy\ReplacePolicyRequest` | PUT | `/enforcement-profile-dur/policy/{product_name}/{policy_id}` | `Policy` or null |
| `EnforcementProfile\Policy\DeletePolicyRequest` | DELETE | `/enforcement-profile-dur/policy/{product_name}/{policy_id}` | null |
| `EnforcementProfile\Policy\GetPolicyByNameRequest` | GET | `/enforcement-profile-dur/policy/{product_name}/name/{name}` | `Policy` or null |
| `EnforcementProfile\Policy\UpdatePolicyByNameRequest` | PATCH | `/enforcement-profile-dur/policy/{product_name}/name/{name}` | `Policy` or null |
| `EnforcementProfile\Policy\ReplacePolicyByNameRequest` | PUT | `/enforcement-profile-dur/policy/{product_name}/name/{name}` | `Policy` or null |
| `EnforcementProfile\Policy\DeletePolicyByNameRequest` | DELETE | `/enforcement-profile-dur/policy/{product_name}/name/{name}` | null |
| `EnforcementProfile\QoSProfile\GetQoSProfilesRequest` | GET | `/enforcement-profile-dur/qos-profile/{product_name}` | Collection of `QoSProfile` |
| `EnforcementProfile\QoSProfile\CreateQoSProfileRequest` | POST | `/enforcement-profile-dur/qos-profile/{product_name}` | `QoSProfile` or null |
| `EnforcementProfile\QoSProfile\GetQoSProfileRequest` | GET | `/enforcement-profile-dur/qos-profile/{product_name}/{qos_profile_id}` | `QoSProfile` or null |
| `EnforcementProfile\QoSProfile\UpdateQoSProfileRequest` | PATCH | `/enforcement-profile-dur/qos-profile/{product_name}/{qos_profile_id}` | `QoSProfile` or null |
| `EnforcementProfile\QoSProfile\ReplaceQoSProfileRequest` | PUT | `/enforcement-profile-dur/qos-profile/{product_name}/{qos_profile_id}` | `QoSProfile` or null |
| `EnforcementProfile\QoSProfile\DeleteQoSProfileRequest` | DELETE | `/enforcement-profile-dur/qos-profile/{product_name}/{qos_profile_id}` | null |
| `EnforcementProfile\QoSProfile\GetQoSProfileByNameRequest` | GET | `/enforcement-profile-dur/qos-profile/{product_name}/name/{name}` | `QoSProfile` or null |
| `EnforcementProfile\QoSProfile\UpdateQoSProfileByNameRequest` | PATCH | `/enforcement-profile-dur/qos-profile/{product_name}/name/{name}` | `QoSProfile` or null |
| `EnforcementProfile\QoSProfile\ReplaceQoSProfileByNameRequest` | PUT | `/enforcement-profile-dur/qos-profile/{product_name}/name/{name}` | `QoSProfile` or null |
| `EnforcementProfile\QoSProfile\DeleteQoSProfileByNameRequest` | DELETE | `/enforcement-profile-dur/qos-profile/{product_name}/name/{name}` | null |
| `EnforcementProfile\SessionAccessControlList\GetSessionAccessControlListsRequest` | GET | `/enforcement-profile-dur/session-access-control-list/{product_name}` | Collection of `SessionAccessControlList` |
| `EnforcementProfile\SessionAccessControlList\CreateSessionAccessControlListRequest` | POST | `/enforcement-profile-dur/session-access-control-list/{product_name}` | `SessionAccessControlList` or null |
| `EnforcementProfile\SessionAccessControlList\GetSessionAccessControlListRequest` | GET | `/enforcement-profile-dur/session-access-control-list/{product_name}/{session_access_control_list_id}` | `SessionAccessControlList` or null |
| `EnforcementProfile\SessionAccessControlList\UpdateSessionAccessControlListRequest` | PATCH | `/enforcement-profile-dur/session-access-control-list/{product_name}/{session_access_control_list_id}` | `SessionAccessControlList` or null |
| `EnforcementProfile\SessionAccessControlList\ReplaceSessionAccessControlListRequest` | PUT | `/enforcement-profile-dur/session-access-control-list/{product_name}/{session_access_control_list_id}` | `SessionAccessControlList` or null |
| `EnforcementProfile\SessionAccessControlList\DeleteSessionAccessControlListRequest` | DELETE | `/enforcement-profile-dur/session-access-control-list/{product_name}/{session_access_control_list_id}` | null |
| `EnforcementProfile\SessionAccessControlList\GetSessionAccessControlListByNameRequest` | GET | `/enforcement-profile-dur/session-access-control-list/{product_name}/name/{name}` | `SessionAccessControlList` or null |
| `EnforcementProfile\SessionAccessControlList\UpdateSessionAccessControlListByNameRequest` | PATCH | `/enforcement-profile-dur/session-access-control-list/{product_name}/name/{name}` | `SessionAccessControlList` or null |
| `EnforcementProfile\SessionAccessControlList\ReplaceSessionAccessControlListByNameRequest` | PUT | `/enforcement-profile-dur/session-access-control-list/{product_name}/name/{name}` | `SessionAccessControlList` or null |
| `EnforcementProfile\SessionAccessControlList\DeleteSessionAccessControlListByNameRequest` | DELETE | `/enforcement-profile-dur/session-access-control-list/{product_name}/name/{name}` | null |
| `EnforcementProfile\StatelessAccessControlList\GetStatelessAccessControlListsRequest` | GET | `/enforcement-profile-dur/stateless-access-control-list/{product_name}` | Collection of `StatelessAccessControlList` |
| `EnforcementProfile\StatelessAccessControlList\CreateStatelessAccessControlListRequest` | POST | `/enforcement-profile-dur/stateless-access-control-list/{product_name}` | `StatelessAccessControlList` or null |
| `EnforcementProfile\StatelessAccessControlList\GetStatelessAccessControlListRequest` | GET | `/enforcement-profile-dur/stateless-access-control-list/{product_name}/{stateless_access_control_list_id}` | `StatelessAccessControlList` or null |
| `EnforcementProfile\StatelessAccessControlList\UpdateStatelessAccessControlListRequest` | PATCH | `/enforcement-profile-dur/stateless-access-control-list/{product_name}/{stateless_access_control_list_id}` | `StatelessAccessControlList` or null |
| `EnforcementProfile\StatelessAccessControlList\ReplaceStatelessAccessControlListRequest` | PUT | `/enforcement-profile-dur/stateless-access-control-list/{product_name}/{stateless_access_control_list_id}` | `StatelessAccessControlList` or null |
| `EnforcementProfile\StatelessAccessControlList\DeleteStatelessAccessControlListRequest` | DELETE | `/enforcement-profile-dur/stateless-access-control-list/{product_name}/{stateless_access_control_list_id}` | null |
| `EnforcementProfile\StatelessAccessControlList\GetStatelessAccessControlListByNameRequest` | GET | `/enforcement-profile-dur/stateless-access-control-list/{product_name}/name/{name}` | `StatelessAccessControlList` or null |
| `EnforcementProfile\StatelessAccessControlList\UpdateStatelessAccessControlListByNameRequest` | PATCH | `/enforcement-profile-dur/stateless-access-control-list/{product_name}/name/{name}` | `StatelessAccessControlList` or null |
| `EnforcementProfile\StatelessAccessControlList\ReplaceStatelessAccessControlListByNameRequest` | PUT | `/enforcement-profile-dur/stateless-access-control-list/{product_name}/name/{name}` | `StatelessAccessControlList` or null |
| `EnforcementProfile\StatelessAccessControlList\DeleteStatelessAccessControlListByNameRequest` | DELETE | `/enforcement-profile-dur/stateless-access-control-list/{product_name}/name/{name}` | null |
| `EnforcementProfile\TimeRange\GetTimeRangesRequest` | GET | `/enforcement-profile-dur/time-range/{product_name}` | Collection of `TimeRange` |
| `EnforcementProfile\TimeRange\CreateTimeRangeRequest` | POST | `/enforcement-profile-dur/time-range/{product_name}` | `TimeRange` or null |
| `EnforcementProfile\TimeRange\GetTimeRangeRequest` | GET | `/enforcement-profile-dur/time-range/{product_name}/{time_range_id}` | `TimeRange` or null |
| `EnforcementProfile\TimeRange\UpdateTimeRangeRequest` | PATCH | `/enforcement-profile-dur/time-range/{product_name}/{time_range_id}` | `TimeRange` or null |
| `EnforcementProfile\TimeRange\ReplaceTimeRangeRequest` | PUT | `/enforcement-profile-dur/time-range/{product_name}/{time_range_id}` | `TimeRange` or null |
| `EnforcementProfile\TimeRange\DeleteTimeRangeRequest` | DELETE | `/enforcement-profile-dur/time-range/{product_name}/{time_range_id}` | null |
| `EnforcementProfile\TimeRange\GetTimeRangeByNameRequest` | GET | `/enforcement-profile-dur/time-range/{product_name}/name/{name}` | `TimeRange` or null |
| `EnforcementProfile\TimeRange\UpdateTimeRangeByNameRequest` | PATCH | `/enforcement-profile-dur/time-range/{product_name}/name/{name}` | `TimeRange` or null |
| `EnforcementProfile\TimeRange\ReplaceTimeRangeByNameRequest` | PUT | `/enforcement-profile-dur/time-range/{product_name}/name/{name}` | `TimeRange` or null |
| `EnforcementProfile\TimeRange\DeleteTimeRangeByNameRequest` | DELETE | `/enforcement-profile-dur/time-range/{product_name}/name/{name}` | null |
| `EnforcementProfile\VoIPProfile\GetVoIPProfilesRequest` | GET | `/enforcement-profile-dur/voip-profile/{product_name}` | Collection of `VoIPProfile` |
| `EnforcementProfile\VoIPProfile\CreateVoIPProfileRequest` | POST | `/enforcement-profile-dur/voip-profile/{product_name}` | `VoIPProfile` or null |
| `EnforcementProfile\VoIPProfile\GetVoIPProfileRequest` | GET | `/enforcement-profile-dur/voip-profile/{product_name}/{voip_profile_id}` | `VoIPProfile` or null |
| `EnforcementProfile\VoIPProfile\UpdateVoIPProfileRequest` | PATCH | `/enforcement-profile-dur/voip-profile/{product_name}/{voip_profile_id}` | `VoIPProfile` or null |
| `EnforcementProfile\VoIPProfile\ReplaceVoIPProfileRequest` | PUT | `/enforcement-profile-dur/voip-profile/{product_name}/{voip_profile_id}` | `VoIPProfile` or null |
| `EnforcementProfile\VoIPProfile\DeleteVoIPProfileRequest` | DELETE | `/enforcement-profile-dur/voip-profile/{product_name}/{voip_profile_id}` | null |
| `EnforcementProfile\VoIPProfile\GetVoIPProfileByNameRequest` | GET | `/enforcement-profile-dur/voip-profile/{product_name}/name/{name}` | `VoIPProfile` or null |
| `EnforcementProfile\VoIPProfile\UpdateVoIPProfileByNameRequest` | PATCH | `/enforcement-profile-dur/voip-profile/{product_name}/name/{name}` | `VoIPProfile` or null |
| `EnforcementProfile\VoIPProfile\ReplaceVoIPProfileByNameRequest` | PUT | `/enforcement-profile-dur/voip-profile/{product_name}/name/{name}` | `VoIPProfile` or null |
| `EnforcementProfile\VoIPProfile\DeleteVoIPProfileByNameRequest` | DELETE | `/enforcement-profile-dur/voip-profile/{product_name}/name/{name}` | null |

## GlobalServerConfiguration

`ClearPass::globalServerConfiguration()`

| Call | Returns |
|---|---|
| `ClearPass::globalServerConfiguration()->adminPrivileges()` | a builder over `AdminPrivilege` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::globalServerConfiguration()->adminUserPasswordPolicy()` | the setting as `AdminUserPasswordPolicy`: `get()`, `replace()`, `update()` |
| `ClearPass::globalServerConfiguration()->adminUsers()` | a builder over `AdminUser` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByUserId(...)`, `updateByUserId(...)`, `replaceByUserId(...)`, `deleteByUserId(...)` |
| `ClearPass::globalServerConfiguration()->applicationLicenses()` | a builder over `ApplicationLicense` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `replace()`, `delete()`, `activateOnline(...)`, `activateOffline(...)`, `summary()` |
| `ClearPass::globalServerConfiguration()->attributes()` | a builder over `Attribute` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::globalServerConfiguration()->clearPassPortal()` | the setting as `ClearPassPortal`: `get()`, `create()` |
| `ClearPass::globalServerConfiguration()->clusterWideParameter()` | the setting as `ClusterWideParameter`: `get()`, `replace()`, `update()` |
| `ClearPass::globalServerConfiguration()->dataFilters()` | a builder over `DataFilter` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::globalServerConfiguration()->fileBackupServers()` | a builder over `FileBackupServer` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByHostAddress(...)`, `updateByHostAddress(...)`, `replaceByHostAddress(...)`, `deleteByHostAddress(...)` |
| `ClearPass::globalServerConfiguration()->listAllPrivileges(...)` | `ListAllPrivileges` or null |
| `ClearPass::globalServerConfiguration()->localUserPasswordPolicy()` | the setting as `LocalUserPasswordPolicy`: `get()`, `replace()`, `update()` |
| `ClearPass::globalServerConfiguration()->messagingSetup()` | the setting as `MessagingSetup`: `get()`, `create()`, `delete()` |
| `ClearPass::globalServerConfiguration()->operatorProfiles()` | a builder over `OperatorProfile` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::globalServerConfiguration()->policyManagerZones()` | a builder over `PolicyManagerZone` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `replace()`, `delete()`, `findByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::globalServerConfiguration()->snmpTrapReceivers()` | a builder over `SnmpTrapReceiver` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::globalServerConfiguration()->syncClusterDatabase(...)` | `ClusterDbSyncResponse` or null |

| Request | Method | Path | Returns |
|---|---|---|---|
| `GlobalServerConfiguration\AdminPrivilege\GetAdminPrivilegesRequest` | GET | `/admin-privilege` | Collection of `AdminPrivilege` |
| `GlobalServerConfiguration\AdminPrivilege\CreateAdminPrivilegeRequest` | POST | `/admin-privilege` | `AdminPrivilege` or null |
| `GlobalServerConfiguration\AdminPrivilege\GetAdminPrivilegeRequest` | GET | `/admin-privilege/{admin_privilege_id}` | `AdminPrivilege` or null |
| `GlobalServerConfiguration\AdminPrivilege\UpdateAdminPrivilegeRequest` | PATCH | `/admin-privilege/{admin_privilege_id}` | `AdminPrivilege` or null |
| `GlobalServerConfiguration\AdminPrivilege\ReplaceAdminPrivilegeRequest` | PUT | `/admin-privilege/{admin_privilege_id}` | `AdminPrivilege` or null |
| `GlobalServerConfiguration\AdminPrivilege\DeleteAdminPrivilegeRequest` | DELETE | `/admin-privilege/{admin_privilege_id}` | null |
| `GlobalServerConfiguration\AdminPrivilege\GetAdminPrivilegeByNameRequest` | GET | `/admin-privilege/name/{name}` | `AdminPrivilege` or null |
| `GlobalServerConfiguration\AdminPrivilege\UpdateAdminPrivilegeByNameRequest` | PATCH | `/admin-privilege/name/{name}` | `AdminPrivilege` or null |
| `GlobalServerConfiguration\AdminPrivilege\ReplaceAdminPrivilegeByNameRequest` | PUT | `/admin-privilege/name/{name}` | `AdminPrivilege` or null |
| `GlobalServerConfiguration\AdminPrivilege\DeleteAdminPrivilegeByNameRequest` | DELETE | `/admin-privilege/name/{name}` | null |
| `GlobalServerConfiguration\AdminUser\GetAdminUsersRequest` | GET | `/admin-user` | Collection of `AdminUser` |
| `GlobalServerConfiguration\AdminUser\CreateAdminUserRequest` | POST | `/admin-user` | `AdminUser` or null |
| `GlobalServerConfiguration\AdminUser\GetAdminUserRequest` | GET | `/admin-user/{id}` | `AdminUser` or null |
| `GlobalServerConfiguration\AdminUser\UpdateAdminUserRequest` | PATCH | `/admin-user/{id}` | `AdminUser` or null |
| `GlobalServerConfiguration\AdminUser\ReplaceAdminUserRequest` | PUT | `/admin-user/{id}` | `AdminUser` or null |
| `GlobalServerConfiguration\AdminUser\DeleteAdminUserRequest` | DELETE | `/admin-user/{id}` | null |
| `GlobalServerConfiguration\AdminUser\GetAdminUserByUserIdRequest` | GET | `/admin-user/user-id/{user_id}` | `AdminUser` or null |
| `GlobalServerConfiguration\AdminUser\UpdateAdminUserByUserIdRequest` | PATCH | `/admin-user/user-id/{user_id}` | `AdminUser` or null |
| `GlobalServerConfiguration\AdminUser\ReplaceAdminUserByUserIdRequest` | PUT | `/admin-user/user-id/{user_id}` | `AdminUser` or null |
| `GlobalServerConfiguration\AdminUser\DeleteAdminUserByUserIdRequest` | DELETE | `/admin-user/user-id/{user_id}` | null |
| `GlobalServerConfiguration\AdminUserPasswordPolicy\GetAdminUserPasswordPolicyRequest` | GET | `/admin-user/password-policy` | `AdminUserPasswordPolicy` or null |
| `GlobalServerConfiguration\AdminUserPasswordPolicy\ReplaceAdminUserPasswordPolicyRequest` | PUT | `/admin-user/password-policy` | `AdminUserPasswordPolicy` or null |
| `GlobalServerConfiguration\AdminUserPasswordPolicy\UpdateAdminUserPasswordPolicyRequest` | PATCH | `/admin-user/password-policy` | `AdminUserPasswordPolicy` or null |
| `GlobalServerConfiguration\ApplicationLicense\GetApplicationLicensesRequest` | GET | `/application-license` | Collection of `ApplicationLicense` |
| `GlobalServerConfiguration\ApplicationLicense\CreateApplicationLicenseRequest` | POST | `/application-license` | `ApplicationLicense` or null |
| `GlobalServerConfiguration\ApplicationLicense\GetApplicationLicenseRequest` | GET | `/application-license/{license_id}` | `ApplicationLicense` or null |
| `GlobalServerConfiguration\ApplicationLicense\ReplaceApplicationLicenseRequest` | PUT | `/application-license/{license_id}` | `ApplicationLicense` or null |
| `GlobalServerConfiguration\ApplicationLicense\DeleteApplicationLicenseRequest` | DELETE | `/application-license/{license_id}` | null |
| `GlobalServerConfiguration\ApplicationLicense\ActivateApplicationLicenseOnlineRequest` | PATCH | `/application-license/activate-online/{license_id}` | `ApplicationLicense` or null |
| `GlobalServerConfiguration\ApplicationLicense\ActivateApplicationLicenseOfflineRequest` | PATCH | `/application-license/activate-offline/{license_id}` | `ApplicationLicense` or null |
| `GlobalServerConfiguration\ApplicationLicense\GetApplicationLicenseSummaryRequest` | GET | `/application-license/summary` | `ApplicationLicenseSummary` or null |
| `GlobalServerConfiguration\Attribute\GetAttributesRequest` | GET | `/attribute` | Collection of `Attribute` |
| `GlobalServerConfiguration\Attribute\CreateAttributeRequest` | POST | `/attribute` | `Attribute` or null |
| `GlobalServerConfiguration\Attribute\GetAttributeRequest` | GET | `/attribute/{attribute_id}` | `Attribute` or null |
| `GlobalServerConfiguration\Attribute\UpdateAttributeRequest` | PATCH | `/attribute/{attribute_id}` | `Attribute` or null |
| `GlobalServerConfiguration\Attribute\ReplaceAttributeRequest` | PUT | `/attribute/{attribute_id}` | `Attribute` or null |
| `GlobalServerConfiguration\Attribute\DeleteAttributeRequest` | DELETE | `/attribute/{attribute_id}` | null |
| `GlobalServerConfiguration\Attribute\GetAttributeByNameRequest` | GET | `/attribute/{entity_name}/name/{name}` | `Attribute` or null |
| `GlobalServerConfiguration\Attribute\UpdateAttributeByNameRequest` | PATCH | `/attribute/{entity_name}/name/{name}` | `Attribute` or null |
| `GlobalServerConfiguration\Attribute\ReplaceAttributeByNameRequest` | PUT | `/attribute/{entity_name}/name/{name}` | `Attribute` or null |
| `GlobalServerConfiguration\Attribute\DeleteAttributeByNameRequest` | DELETE | `/attribute/{entity_name}/name/{name}` | null |
| `GlobalServerConfiguration\ClearPassPortal\GetClearPassPortalRequest` | GET | `/clearpass-portal` | `ClearPassPortal` or null |
| `GlobalServerConfiguration\ClearPassPortal\CreateClearPassPortalRequest` | POST | `/clearpass-portal` | `ClearPassPortal` or null |
| `GlobalServerConfiguration\ClusterDbSync\SyncClusterDatabaseRequest` | POST | `/cluster/db-sync` | `ClusterDbSyncResponse` or null |
| `GlobalServerConfiguration\ClusterWideParameter\GetClusterWideParameterRequest` | GET | `/cluster/parameters` | `ClusterWideParameter` or null |
| `GlobalServerConfiguration\ClusterWideParameter\ReplaceClusterWideParameterRequest` | PUT | `/cluster/parameters` | `ClusterWideParameter` or null |
| `GlobalServerConfiguration\ClusterWideParameter\UpdateClusterWideParameterRequest` | PATCH | `/cluster/parameters` | `ClusterWideParameter` or null |
| `GlobalServerConfiguration\DataFilter\GetDataFiltersRequest` | GET | `/data-filter` | Collection of `DataFilter` |
| `GlobalServerConfiguration\DataFilter\CreateDataFilterRequest` | POST | `/data-filter` | `DataFilter` or null |
| `GlobalServerConfiguration\DataFilter\GetDataFilterRequest` | GET | `/data-filter/{data_filter_id}` | `DataFilter` or null |
| `GlobalServerConfiguration\DataFilter\UpdateDataFilterRequest` | PATCH | `/data-filter/{data_filter_id}` | `DataFilter` or null |
| `GlobalServerConfiguration\DataFilter\ReplaceDataFilterRequest` | PUT | `/data-filter/{data_filter_id}` | `DataFilter` or null |
| `GlobalServerConfiguration\DataFilter\DeleteDataFilterRequest` | DELETE | `/data-filter/{data_filter_id}` | null |
| `GlobalServerConfiguration\DataFilter\GetDataFilterByNameRequest` | GET | `/data-filter/name/{name}` | `DataFilter` or null |
| `GlobalServerConfiguration\DataFilter\UpdateDataFilterByNameRequest` | PATCH | `/data-filter/name/{name}` | `DataFilter` or null |
| `GlobalServerConfiguration\DataFilter\ReplaceDataFilterByNameRequest` | PUT | `/data-filter/name/{name}` | `DataFilter` or null |
| `GlobalServerConfiguration\DataFilter\DeleteDataFilterByNameRequest` | DELETE | `/data-filter/name/{name}` | null |
| `GlobalServerConfiguration\FileBackupServer\GetFileBackupServersRequest` | GET | `/file-backup-server` | Collection of `FileBackupServer` |
| `GlobalServerConfiguration\FileBackupServer\CreateFileBackupServerRequest` | POST | `/file-backup-server` | `FileBackupServer` or null |
| `GlobalServerConfiguration\FileBackupServer\GetFileBackupServerRequest` | GET | `/file-backup-server/{file_backup_server_id}` | `FileBackupServer` or null |
| `GlobalServerConfiguration\FileBackupServer\UpdateFileBackupServerRequest` | PATCH | `/file-backup-server/{file_backup_server_id}` | `FileBackupServer` or null |
| `GlobalServerConfiguration\FileBackupServer\ReplaceFileBackupServerRequest` | PUT | `/file-backup-server/{file_backup_server_id}` | `FileBackupServer` or null |
| `GlobalServerConfiguration\FileBackupServer\DeleteFileBackupServerRequest` | DELETE | `/file-backup-server/{file_backup_server_id}` | null |
| `GlobalServerConfiguration\FileBackupServer\GetFileBackupServerByHostAddressRequest` | GET | `/file-backup-server/host-address/{host_address}` | `FileBackupServer` or null |
| `GlobalServerConfiguration\FileBackupServer\UpdateFileBackupServerByHostAddressRequest` | PATCH | `/file-backup-server/host-address/{host_address}` | `FileBackupServer` or null |
| `GlobalServerConfiguration\FileBackupServer\ReplaceFileBackupServerByHostAddressRequest` | PUT | `/file-backup-server/host-address/{host_address}` | `FileBackupServer` or null |
| `GlobalServerConfiguration\FileBackupServer\DeleteFileBackupServerByHostAddressRequest` | DELETE | `/file-backup-server/host-address/{host_address}` | null |
| `GlobalServerConfiguration\ListAllPrivileges\ListAllPrivilegesRequest` | GET | `/oauth/all-privileges` | `ListAllPrivileges` or null |
| `GlobalServerConfiguration\LocalUserPasswordPolicy\GetLocalUserPasswordPolicyRequest` | GET | `/local-user/password-policy` | `LocalUserPasswordPolicy` or null |
| `GlobalServerConfiguration\LocalUserPasswordPolicy\ReplaceLocalUserPasswordPolicyRequest` | PUT | `/local-user/password-policy` | `LocalUserPasswordPolicy` or null |
| `GlobalServerConfiguration\LocalUserPasswordPolicy\UpdateLocalUserPasswordPolicyRequest` | PATCH | `/local-user/password-policy` | `LocalUserPasswordPolicy` or null |
| `GlobalServerConfiguration\MessagingSetup\GetMessagingSetupRequest` | GET | `/messaging-setup` | `MessagingSetup` or null |
| `GlobalServerConfiguration\MessagingSetup\CreateMessagingSetupRequest` | POST | `/messaging-setup` | `MessagingSetup` or null |
| `GlobalServerConfiguration\MessagingSetup\DeleteMessagingSetupRequest` | DELETE | `/messaging-setup` | null |
| `GlobalServerConfiguration\OperatorProfile\GetOperatorProfilesRequest` | GET | `/operator-profile` | Collection of `OperatorProfile` |
| `GlobalServerConfiguration\OperatorProfile\CreateOperatorProfileRequest` | POST | `/operator-profile` | `OperatorProfile` or null |
| `GlobalServerConfiguration\OperatorProfile\GetOperatorProfileRequest` | GET | `/operator-profile/{id}` | `OperatorProfile` or null |
| `GlobalServerConfiguration\OperatorProfile\UpdateOperatorProfileRequest` | PATCH | `/operator-profile/{id}` | `OperatorProfile` or null |
| `GlobalServerConfiguration\OperatorProfile\ReplaceOperatorProfileRequest` | PUT | `/operator-profile/{id}` | `OperatorProfile` or null |
| `GlobalServerConfiguration\OperatorProfile\DeleteOperatorProfileRequest` | DELETE | `/operator-profile/{id}` | null |
| `GlobalServerConfiguration\OperatorProfile\GetOperatorProfileByNameRequest` | GET | `/operator-profile/name/{name}` | `OperatorProfile` or null |
| `GlobalServerConfiguration\OperatorProfile\UpdateOperatorProfileByNameRequest` | PATCH | `/operator-profile/name/{name}` | `OperatorProfile` or null |
| `GlobalServerConfiguration\OperatorProfile\ReplaceOperatorProfileByNameRequest` | PUT | `/operator-profile/name/{name}` | `OperatorProfile` or null |
| `GlobalServerConfiguration\OperatorProfile\DeleteOperatorProfileByNameRequest` | DELETE | `/operator-profile/name/{name}` | null |
| `GlobalServerConfiguration\PolicyManagerZone\GetPolicyManagerZonesRequest` | GET | `/server/policy-manager-zones` | Collection of `PolicyManagerZone` |
| `GlobalServerConfiguration\PolicyManagerZone\CreatePolicyManagerZoneRequest` | POST | `/server/policy-manager-zones` | `PolicyManagerZone` or null |
| `GlobalServerConfiguration\PolicyManagerZone\GetPolicyManagerZoneRequest` | GET | `/server/policy-manager-zones/{zone_id}` | `PolicyManagerZone` or null |
| `GlobalServerConfiguration\PolicyManagerZone\ReplacePolicyManagerZoneRequest` | PUT | `/server/policy-manager-zones/{zone_id}` | `PolicyManagerZone` or null |
| `GlobalServerConfiguration\PolicyManagerZone\DeletePolicyManagerZoneRequest` | DELETE | `/server/policy-manager-zones/{zone_id}` | null |
| `GlobalServerConfiguration\PolicyManagerZone\GetPolicyManagerZoneByNameRequest` | GET | `/server/policy-manager-zones/name/{name}` | `PolicyManagerZone` or null |
| `GlobalServerConfiguration\PolicyManagerZone\ReplacePolicyManagerZoneByNameRequest` | PUT | `/server/policy-manager-zones/name/{name}` | `PolicyManagerZone` or null |
| `GlobalServerConfiguration\PolicyManagerZone\DeletePolicyManagerZoneByNameRequest` | DELETE | `/server/policy-manager-zones/name/{name}` | null |
| `GlobalServerConfiguration\SnmpTrapReceiver\GetSnmpTrapReceiversRequest` | GET | `/snmp-trap-receiver` | Collection of `SnmpTrapReceiver` |
| `GlobalServerConfiguration\SnmpTrapReceiver\CreateSnmpTrapReceiverRequest` | POST | `/snmp-trap-receiver` | `SnmpTrapReceiver` or null |
| `GlobalServerConfiguration\SnmpTrapReceiver\GetSnmpTrapReceiverRequest` | GET | `/snmp-trap-receiver/{snmp_trap_receiver_id}` | `SnmpTrapReceiver` or null |
| `GlobalServerConfiguration\SnmpTrapReceiver\UpdateSnmpTrapReceiverRequest` | PATCH | `/snmp-trap-receiver/{snmp_trap_receiver_id}` | `SnmpTrapReceiver` or null |
| `GlobalServerConfiguration\SnmpTrapReceiver\ReplaceSnmpTrapReceiverRequest` | PUT | `/snmp-trap-receiver/{snmp_trap_receiver_id}` | `SnmpTrapReceiver` or null |
| `GlobalServerConfiguration\SnmpTrapReceiver\DeleteSnmpTrapReceiverRequest` | DELETE | `/snmp-trap-receiver/{snmp_trap_receiver_id}` | null |
| `GlobalServerConfiguration\SnmpTrapReceiver\GetSnmpTrapReceiverByNameRequest` | GET | `/snmp-trap-receiver/name/{name}` | `SnmpTrapReceiver` or null |
| `GlobalServerConfiguration\SnmpTrapReceiver\UpdateSnmpTrapReceiverByNameRequest` | PATCH | `/snmp-trap-receiver/name/{name}` | `SnmpTrapReceiver` or null |
| `GlobalServerConfiguration\SnmpTrapReceiver\ReplaceSnmpTrapReceiverByNameRequest` | PUT | `/snmp-trap-receiver/name/{name}` | `SnmpTrapReceiver` or null |
| `GlobalServerConfiguration\SnmpTrapReceiver\DeleteSnmpTrapReceiverByNameRequest` | DELETE | `/snmp-trap-receiver/name/{name}` | null |

## GuestActions

`ClearPass::guestActions()`

| Call | Returns |
|---|---|
| `ClearPass::guestActions()->approveSponsorship(...)` | `SponsorshipApprovalResponse` or null |
| `ClearPass::guestActions()->generateGuestDigitalPass(...)` | `GuestDigitalReceiptResponse` or null |
| `ClearPass::guestActions()->generateGuestReceipt(...)` | `GenerateGuestReceiptResponse` or null |
| `ClearPass::guestActions()->sendSmsReceipt(...)` | `SmsReceiptResponse` or null |
| `ClearPass::guestActions()->sendSmtpReceipt(...)` | `SmtpReceiptResponse` or null |

| Request | Method | Path | Returns |
|---|---|---|---|
| `GuestActions\GenerateGuestDigitalPass\GenerateGuestDigitalPassRequest` | GET | `/guest/{guest_id}/pass/{id}` | `GuestDigitalReceiptResponse` or null |
| `GuestActions\GenerateGuestReceipt\GenerateGuestReceiptRequest` | GET | `/guest/{guest_id}/receipt/{id}` | `GenerateGuestReceiptResponse` or null |
| `GuestActions\SendSmsReceipt\SendSmsReceiptRequest` | POST | `/guest/{guest_id}/sendreceipt/sms` | `SmsReceiptResponse` or null |
| `GuestActions\SendSmtpReceipt\SendSmtpReceiptRequest` | POST | `/guest/{guest_id}/sendreceipt/smtp` | `SmtpReceiptResponse` or null |
| `GuestActions\SponsorshipApproval\ApproveSponsorshipRequest` | POST | `/guest/{guest_id}/sponsor` | `SponsorshipApprovalResponse` or null |

## GuestConfiguration

`ClearPass::guestConfiguration()`

| Call | Returns |
|---|---|
| `ClearPass::guestConfiguration()->digitalPassTemplates()` | a builder over `DigitalPassTemplate` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()` |
| `ClearPass::guestConfiguration()->guestAuthenticationConfiguration()` | the setting as `GuestAuthenticationConfiguration`: `get()`, `create()`, `update()` |
| `ClearPass::guestConfiguration()->guestManager()` | the setting as `GuestManager`: `get()`, `create()`, `update()` |
| `ClearPass::guestConfiguration()->printTemplates()` | a builder over `PrintTemplate` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()` |
| `ClearPass::guestConfiguration()->webLogins()` | a builder over `WebLogin` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByPageName(...)`, `updateByPageName(...)`, `replaceByPageName(...)`, `deleteByPageName(...)` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `GuestConfiguration\DigitalPassTemplate\GetDigitalPassTemplatesRequest` | GET | `/template/pass` | Collection of `DigitalPassTemplate` |
| `GuestConfiguration\DigitalPassTemplate\CreateDigitalPassTemplateRequest` | POST | `/template/pass` | `DigitalPassTemplate` or null |
| `GuestConfiguration\DigitalPassTemplate\GetDigitalPassTemplateRequest` | GET | `/template/pass/{id}` | `DigitalPassTemplate` or null |
| `GuestConfiguration\DigitalPassTemplate\UpdateDigitalPassTemplateRequest` | PATCH | `/template/pass/{id}` | `DigitalPassTemplate` or null |
| `GuestConfiguration\DigitalPassTemplate\ReplaceDigitalPassTemplateRequest` | PUT | `/template/pass/{id}` | `DigitalPassTemplate` or null |
| `GuestConfiguration\DigitalPassTemplate\DeleteDigitalPassTemplateRequest` | DELETE | `/template/pass/{id}` | null |
| `GuestConfiguration\GuestAuthenticationConfiguration\GetGuestAuthenticationConfigurationRequest` | GET | `/guest/authentication` | `GuestAuthenticationConfiguration` or null |
| `GuestConfiguration\GuestAuthenticationConfiguration\CreateGuestAuthenticationConfigurationRequest` | POST | `/guest/authentication` | `GuestAuthenticationConfiguration` or null |
| `GuestConfiguration\GuestAuthenticationConfiguration\UpdateGuestAuthenticationConfigurationRequest` | PATCH | `/guest/authentication` | `GuestAuthenticationConfiguration` or null |
| `GuestConfiguration\GuestManager\GetGuestManagerRequest` | GET | `/guestmanager` | `GuestManager` or null |
| `GuestConfiguration\GuestManager\CreateGuestManagerRequest` | POST | `/guestmanager` | `GuestManager` or null |
| `GuestConfiguration\GuestManager\UpdateGuestManagerRequest` | PATCH | `/guestmanager` | `GuestManager` or null |
| `GuestConfiguration\PrintTemplate\GetPrintTemplatesRequest` | GET | `/template/print` | Collection of `PrintTemplate` |
| `GuestConfiguration\PrintTemplate\CreatePrintTemplateRequest` | POST | `/template/print` | `PrintTemplate` or null |
| `GuestConfiguration\PrintTemplate\GetPrintTemplateRequest` | GET | `/template/print/{id}` | `PrintTemplate` or null |
| `GuestConfiguration\PrintTemplate\UpdatePrintTemplateRequest` | PATCH | `/template/print/{id}` | `PrintTemplate` or null |
| `GuestConfiguration\PrintTemplate\ReplacePrintTemplateRequest` | PUT | `/template/print/{id}` | `PrintTemplate` or null |
| `GuestConfiguration\PrintTemplate\DeletePrintTemplateRequest` | DELETE | `/template/print/{id}` | null |
| `GuestConfiguration\WebLogin\GetWebLoginsRequest` | GET | `/weblogin` | Collection of `WebLogin` |
| `GuestConfiguration\WebLogin\CreateWebLoginRequest` | POST | `/weblogin` | `WebLogin` or null |
| `GuestConfiguration\WebLogin\GetWebLoginRequest` | GET | `/weblogin/{id}` | `WebLogin` or null |
| `GuestConfiguration\WebLogin\UpdateWebLoginRequest` | PATCH | `/weblogin/{id}` | `WebLogin` or null |
| `GuestConfiguration\WebLogin\ReplaceWebLoginRequest` | PUT | `/weblogin/{id}` | `WebLogin` or null |
| `GuestConfiguration\WebLogin\DeleteWebLoginRequest` | DELETE | `/weblogin/{id}` | null |
| `GuestConfiguration\WebLogin\GetWebLoginByPageNameRequest` | GET | `/weblogin/page-name/{page-name}` | `WebLogin` or null |
| `GuestConfiguration\WebLogin\UpdateWebLoginByPageNameRequest` | PATCH | `/weblogin/page-name/{page-name}` | `WebLogin` or null |
| `GuestConfiguration\WebLogin\ReplaceWebLoginByPageNameRequest` | PUT | `/weblogin/page-name/{page-name}` | `WebLogin` or null |
| `GuestConfiguration\WebLogin\DeleteWebLoginByPageNameRequest` | DELETE | `/weblogin/page-name/{page-name}` | null |

## Identities

`ClearPass::identities()`

| Call | Returns |
|---|---|
| `ClearPass::identities()->apiClients()` | a builder over `ApiClient` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()` |
| `ClearPass::identities()->denyListedUsers()` | a builder over `DenyListedUsers` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `delete()`, `findByUserIdAndMacAddress(...)`, `deleteUserIdMacAddress(...)` |
| `ClearPass::identities()->devices()` | a builder over `Device` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByMac(...)`, `updateByMac(...)`, `replaceByMac(...)`, `deleteByMac(...)` |
| `ClearPass::identities()->endpoints()` | a builder over `Endpoint` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByMacAddress(...)`, `updateByMacAddress(...)`, `replaceByMacAddress(...)`, `deleteByMacAddress(...)` |
| `ClearPass::identities()->externalAccounts()` | a builder over `ExternalAccount` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::identities()->guestUsers()` | a builder over `GuestUser` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByUsername(...)`, `updateByUsername(...)`, `replaceByUsername(...)`, `deleteByUsername(...)` |
| `ClearPass::identities()->localUsers()` | a builder over `LocalUser` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByUserId(...)`, `updateByUserId(...)`, `replaceByUserId(...)`, `deleteByUserId(...)` |
| `ClearPass::identities()->staticHostLists()` | a builder over `StaticHostList` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Identities\ApiClient\GetApiClientsRequest` | GET | `/api-client` | Collection of `ApiClient` |
| `Identities\ApiClient\CreateApiClientRequest` | POST | `/api-client` | `ApiClient` or null |
| `Identities\ApiClient\GetApiClientRequest` | GET | `/api-client/{client_id}` | `ApiClient` or null |
| `Identities\ApiClient\UpdateApiClientRequest` | PATCH | `/api-client/{client_id}` | `ApiClient` or null |
| `Identities\ApiClient\ReplaceApiClientRequest` | PUT | `/api-client/{client_id}` | `ApiClient` or null |
| `Identities\ApiClient\DeleteApiClientRequest` | DELETE | `/api-client/{client_id}` | null |
| `Identities\DenyListedUsers\GetDenyListedUsersRequest` | GET | `/deny-listed-users` | Collection of `DenyListedUsers` |
| `Identities\DenyListedUsers\GetDenyListedUserRequest` | GET | `/deny-listed-users/{deny_listed_users_id}` | `DenyListedUsers` or null |
| `Identities\DenyListedUsers\DeleteDenyListedUserRequest` | DELETE | `/deny-listed-users/{deny_listed_users_id}` | null |
| `Identities\DenyListedUsers\GetDenyListedUserByUserIdAndMacAddressRequest` | GET | `/deny-listed-users/user_id/{user_id}/mac_address/{mac_address}` | `DenyListedUsers` or null |
| `Identities\DenyListedUsers\DeleteDenyListedUserUserIdMacAddressRequest` | DELETE | `/deny-listed-users/user_id/{user_id}/mac_address/{mac_address}` | null |
| `Identities\Device\GetDevicesRequest` | GET | `/device` | Collection of `Device` |
| `Identities\Device\CreateDeviceRequest` | POST | `/device` | `Device` or null |
| `Identities\Device\GetDeviceRequest` | GET | `/device/{device_id}` | `Device` or null |
| `Identities\Device\UpdateDeviceRequest` | PATCH | `/device/{device_id}` | `Device` or null |
| `Identities\Device\ReplaceDeviceRequest` | PUT | `/device/{device_id}` | `Device` or null |
| `Identities\Device\DeleteDeviceRequest` | DELETE | `/device/{device_id}` | null |
| `Identities\Device\GetDeviceByMacRequest` | GET | `/device/mac/{macaddr}` | `Device` or null |
| `Identities\Device\UpdateDeviceByMacRequest` | PATCH | `/device/mac/{macaddr}` | `Device` or null |
| `Identities\Device\ReplaceDeviceByMacRequest` | PUT | `/device/mac/{macaddr}` | `Device` or null |
| `Identities\Device\DeleteDeviceByMacRequest` | DELETE | `/device/mac/{macaddr}` | null |
| `Identities\Endpoint\GetEndpointsRequest` | GET | `/endpoint` | Collection of `Endpoint` |
| `Identities\Endpoint\CreateEndpointRequest` | POST | `/endpoint` | `Endpoint` or null |
| `Identities\Endpoint\GetEndpointRequest` | GET | `/endpoint/{endpoint_id}` | `Endpoint` or null |
| `Identities\Endpoint\UpdateEndpointRequest` | PATCH | `/endpoint/{endpoint_id}` | `Endpoint` or null |
| `Identities\Endpoint\ReplaceEndpointRequest` | PUT | `/endpoint/{endpoint_id}` | `Endpoint` or null |
| `Identities\Endpoint\DeleteEndpointRequest` | DELETE | `/endpoint/{endpoint_id}` | null |
| `Identities\Endpoint\GetEndpointByMacAddressRequest` | GET | `/endpoint/mac-address/{mac_address}` | `Endpoint` or null |
| `Identities\Endpoint\UpdateEndpointByMacAddressRequest` | PATCH | `/endpoint/mac-address/{mac_address}` | `Endpoint` or null |
| `Identities\Endpoint\ReplaceEndpointByMacAddressRequest` | PUT | `/endpoint/mac-address/{mac_address}` | `Endpoint` or null |
| `Identities\Endpoint\DeleteEndpointByMacAddressRequest` | DELETE | `/endpoint/mac-address/{mac_address}` | null |
| `Identities\ExternalAccount\GetExternalAccountsRequest` | GET | `/external-account` | Collection of `ExternalAccount` |
| `Identities\ExternalAccount\CreateExternalAccountRequest` | POST | `/external-account` | `ExternalAccount` or null |
| `Identities\ExternalAccount\GetExternalAccountRequest` | GET | `/external-account/{external_account_id}` | `ExternalAccount` or null |
| `Identities\ExternalAccount\UpdateExternalAccountRequest` | PATCH | `/external-account/{external_account_id}` | `ExternalAccount` or null |
| `Identities\ExternalAccount\ReplaceExternalAccountRequest` | PUT | `/external-account/{external_account_id}` | `ExternalAccount` or null |
| `Identities\ExternalAccount\DeleteExternalAccountRequest` | DELETE | `/external-account/{external_account_id}` | null |
| `Identities\ExternalAccount\GetExternalAccountByNameRequest` | GET | `/external-account/name/{name}` | `ExternalAccount` or null |
| `Identities\ExternalAccount\UpdateExternalAccountByNameRequest` | PATCH | `/external-account/name/{name}` | `ExternalAccount` or null |
| `Identities\ExternalAccount\ReplaceExternalAccountByNameRequest` | PUT | `/external-account/name/{name}` | `ExternalAccount` or null |
| `Identities\ExternalAccount\DeleteExternalAccountByNameRequest` | DELETE | `/external-account/name/{name}` | null |
| `Identities\GuestUser\GetGuestUsersRequest` | GET | `/guest` | Collection of `GuestUser` |
| `Identities\GuestUser\CreateGuestUserRequest` | POST | `/guest` | `GuestUser` or null |
| `Identities\GuestUser\GetGuestUserRequest` | GET | `/guest/{guest_id}` | `GuestUser` or null |
| `Identities\GuestUser\UpdateGuestUserRequest` | PATCH | `/guest/{guest_id}` | `GuestUser` or null |
| `Identities\GuestUser\ReplaceGuestUserRequest` | PUT | `/guest/{guest_id}` | `GuestUser` or null |
| `Identities\GuestUser\DeleteGuestUserRequest` | DELETE | `/guest/{guest_id}` | null |
| `Identities\GuestUser\GetGuestUserByUsernameRequest` | GET | `/guest/username/{username}` | `GuestUser` or null |
| `Identities\GuestUser\UpdateGuestUserByUsernameRequest` | PATCH | `/guest/username/{username}` | `GuestUser` or null |
| `Identities\GuestUser\ReplaceGuestUserByUsernameRequest` | PUT | `/guest/username/{username}` | `GuestUser` or null |
| `Identities\GuestUser\DeleteGuestUserByUsernameRequest` | DELETE | `/guest/username/{username}` | null |
| `Identities\LocalUser\GetLocalUsersRequest` | GET | `/local-user` | Collection of `LocalUser` |
| `Identities\LocalUser\CreateLocalUserRequest` | POST | `/local-user` | `LocalUser` or null |
| `Identities\LocalUser\GetLocalUserRequest` | GET | `/local-user/{local_user_id}` | `LocalUser` or null |
| `Identities\LocalUser\UpdateLocalUserRequest` | PATCH | `/local-user/{local_user_id}` | `LocalUser` or null |
| `Identities\LocalUser\ReplaceLocalUserRequest` | PUT | `/local-user/{local_user_id}` | `LocalUser` or null |
| `Identities\LocalUser\DeleteLocalUserRequest` | DELETE | `/local-user/{local_user_id}` | null |
| `Identities\LocalUser\GetLocalUserByUserIdRequest` | GET | `/local-user/user-id/{user_id}` | `LocalUser` or null |
| `Identities\LocalUser\UpdateLocalUserByUserIdRequest` | PATCH | `/local-user/user-id/{user_id}` | `LocalUser` or null |
| `Identities\LocalUser\ReplaceLocalUserByUserIdRequest` | PUT | `/local-user/user-id/{user_id}` | `LocalUser` or null |
| `Identities\LocalUser\DeleteLocalUserByUserIdRequest` | DELETE | `/local-user/user-id/{user_id}` | null |
| `Identities\StaticHostList\GetStaticHostListsRequest` | GET | `/static-host-list` | Collection of `StaticHostList` |
| `Identities\StaticHostList\CreateStaticHostListRequest` | POST | `/static-host-list` | `StaticHostList` or null |
| `Identities\StaticHostList\GetStaticHostListRequest` | GET | `/static-host-list/{static_host_list_id}` | `StaticHostList` or null |
| `Identities\StaticHostList\UpdateStaticHostListRequest` | PATCH | `/static-host-list/{static_host_list_id}` | `StaticHostList` or null |
| `Identities\StaticHostList\ReplaceStaticHostListRequest` | PUT | `/static-host-list/{static_host_list_id}` | `StaticHostList` or null |
| `Identities\StaticHostList\DeleteStaticHostListRequest` | DELETE | `/static-host-list/{static_host_list_id}` | null |
| `Identities\StaticHostList\GetStaticHostListByNameRequest` | GET | `/static-host-list/name/{name}` | `StaticHostList` or null |
| `Identities\StaticHostList\UpdateStaticHostListByNameRequest` | PATCH | `/static-host-list/name/{name}` | `StaticHostList` or null |
| `Identities\StaticHostList\ReplaceStaticHostListByNameRequest` | PUT | `/static-host-list/name/{name}` | `StaticHostList` or null |
| `Identities\StaticHostList\DeleteStaticHostListByNameRequest` | DELETE | `/static-host-list/name/{name}` | null |

## Insight

`ClearPass::insight()`

| Call | Returns |
|---|---|
| `ClearPass::insight()->alerts()` | a builder over `Alert` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)`, `enable(...)`, `disable(...)`, `mute(...)`, `unmute(...)`, `enableByName(...)`, `disableByName(...)`, `muteByName(...)`, `unmuteByName(...)` |
| `ClearPass::insight()->reports()` | a builder over `Report` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)`, `enable(...)`, `disable(...)`, `enableByName(...)`, `disableByName(...)`, `run(...)`, `runByName(...)` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Insight\Alert\GetAlertsRequest` | GET | `/alert` | Collection of `Alert` |
| `Insight\Alert\CreateAlertRequest` | POST | `/alert` | `Alert` or null |
| `Insight\Alert\GetAlertRequest` | GET | `/alert/{id}` | `Alert` or null |
| `Insight\Alert\UpdateAlertRequest` | PATCH | `/alert/{id}` | `Alert` or null |
| `Insight\Alert\ReplaceAlertRequest` | PUT | `/alert/{id}` | `Alert` or null |
| `Insight\Alert\DeleteAlertRequest` | DELETE | `/alert/{id}` | null |
| `Insight\Alert\GetAlertByNameRequest` | GET | `/alert/{name}` | `Alert` or null |
| `Insight\Alert\UpdateAlertByNameRequest` | PATCH | `/alert/{name}` | `Alert` or null |
| `Insight\Alert\ReplaceAlertByNameRequest` | PUT | `/alert/{name}` | `Alert` or null |
| `Insight\Alert\DeleteAlertByNameRequest` | DELETE | `/alert/{name}` | null |
| `Insight\Alert\EnableAlertRequest` | PATCH | `/alert/{id}/enable` | `Alert` or null |
| `Insight\Alert\DisableAlertRequest` | PATCH | `/alert/{id}/disable` | `Alert` or null |
| `Insight\Alert\MuteAlertRequest` | PATCH | `/alert/{id}/mute` | `Alert` or null |
| `Insight\Alert\UnmuteAlertRequest` | PATCH | `/alert/{id}/unmute` | `Alert` or null |
| `Insight\Alert\EnableAlertByNameRequest` | PATCH | `/alert/{name}/enable` | `Alert` or null |
| `Insight\Alert\DisableAlertByNameRequest` | PATCH | `/alert/{name}/disable` | `Alert` or null |
| `Insight\Alert\MuteAlertByNameRequest` | PATCH | `/alert/{name}/mute` | `Alert` or null |
| `Insight\Alert\UnmuteAlertByNameRequest` | PATCH | `/alert/{name}/unmute` | `Alert` or null |
| `Insight\Report\GetReportsRequest` | GET | `/report` | Collection of `Report` |
| `Insight\Report\CreateReportRequest` | POST | `/report` | `Report` or null |
| `Insight\Report\GetReportRequest` | GET | `/report/{id}` | `Report` or null |
| `Insight\Report\UpdateReportRequest` | PATCH | `/report/{id}` | `Report` or null |
| `Insight\Report\ReplaceReportRequest` | PUT | `/report/{id}` | `Report` or null |
| `Insight\Report\DeleteReportRequest` | DELETE | `/report/{id}` | null |
| `Insight\Report\GetReportByNameRequest` | GET | `/report/{name}` | `Report` or null |
| `Insight\Report\UpdateReportByNameRequest` | PATCH | `/report/{name}` | `Report` or null |
| `Insight\Report\ReplaceReportByNameRequest` | PUT | `/report/{name}` | `Report` or null |
| `Insight\Report\DeleteReportByNameRequest` | DELETE | `/report/{name}` | null |
| `Insight\Report\EnableReportRequest` | PATCH | `/report/{id}/enable` | `Report` or null |
| `Insight\Report\DisableReportRequest` | PATCH | `/report/{id}/disable` | `Report` or null |
| `Insight\Report\EnableReportByNameRequest` | PATCH | `/report/{name}/enable` | `Report` or null |
| `Insight\Report\DisableReportByNameRequest` | PATCH | `/report/{name}/disable` | `Report` or null |
| `Insight\Report\RunReportRequest` | POST | `/report/{id}/run` | `Report` or null |
| `Insight\Report\RunReportByNameRequest` | POST | `/report/{name}/run` | `Report` or null |

## Integrations

`ClearPass::integrations()`

| Call | Returns |
|---|---|
| `ClearPass::integrations()->contextServerActions()` | a builder over `ContextServerAction` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByActionName(...)`, `updateByActionName(...)`, `replaceByActionName(...)`, `deleteByActionName(...)` |
| `ClearPass::integrations()->deviceInsight()` | the setting as `DeviceInsight`: `get()`, `create()` |
| `ClearPass::integrations()->endpointContextServers()` | a builder over `EndpointContextServer` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByServerName(...)`, `updateByServerName(...)`, `replaceByServerName(...)`, `deleteByServerName(...)`, `triggerPoll(...)`, `triggerPollByServerName(...)` |
| `ClearPass::integrations()->eventSources()` | a builder over `EventSources` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::integrations()->extensionInstanceConfig(...)` | the setting as `ExtensionInstanceConfig`: `get()`, `replace()` |
| `ClearPass::integrations()->extensionInstanceLog(...)` | `ExtensionInstanceLog` or null |
| `ClearPass::integrations()->extensionInstanceUpgrade(...)` | the setting as `ExtensionInstance`: `get()`, `upgrade(...)` |
| `ClearPass::integrations()->extensionInstances()` | a builder over `ExtensionInstance` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `delete()` |
| `ClearPass::integrations()->extensionStores()` | a builder over `ExtensionStore` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)` |
| `ClearPass::integrations()->ingressEventDictionaries()` | a builder over `IngressEventDictionary` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByFormatName(...)`, `updateByFormatName(...)`, `replaceByFormatName(...)`, `deleteByFormatName(...)` |
| `ClearPass::integrations()->reinstallExtensionInstance(...)` | `ExtensionInstance` or null |
| `ClearPass::integrations()->restartExtensionInstance(...)` | array or null |
| `ClearPass::integrations()->startExtensionInstance(...)` | array or null |
| `ClearPass::integrations()->stopExtensionInstance(...)` | array or null |
| `ClearPass::integrations()->syslogExportFilters()` | a builder over `SyslogExportFilter` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::integrations()->syslogTargets()` | a builder over `SyslogTarget` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByHostAddress(...)`, `updateByHostAddress(...)`, `replaceByHostAddress(...)`, `deleteByHostAddress(...)` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Integrations\ContextServerAction\GetContextServerActionsRequest` | GET | `/context-server-action` | Collection of `ContextServerAction` |
| `Integrations\ContextServerAction\CreateContextServerActionRequest` | POST | `/context-server-action` | `ContextServerAction` or null |
| `Integrations\ContextServerAction\GetContextServerActionRequest` | GET | `/context-server-action/{context_server_action_id}` | `ContextServerAction` or null |
| `Integrations\ContextServerAction\UpdateContextServerActionRequest` | PATCH | `/context-server-action/{context_server_action_id}` | `ContextServerAction` or null |
| `Integrations\ContextServerAction\ReplaceContextServerActionRequest` | PUT | `/context-server-action/{context_server_action_id}` | `ContextServerAction` or null |
| `Integrations\ContextServerAction\DeleteContextServerActionRequest` | DELETE | `/context-server-action/{context_server_action_id}` | null |
| `Integrations\ContextServerAction\GetContextServerActionByActionNameRequest` | GET | `/context-server-action/{server_type}/action-name/{action_name}` | `ContextServerAction` or null |
| `Integrations\ContextServerAction\UpdateContextServerActionByActionNameRequest` | PATCH | `/context-server-action/{server_type}/action-name/{action_name}` | `ContextServerAction` or null |
| `Integrations\ContextServerAction\ReplaceContextServerActionByActionNameRequest` | PUT | `/context-server-action/{server_type}/action-name/{action_name}` | `ContextServerAction` or null |
| `Integrations\ContextServerAction\DeleteContextServerActionByActionNameRequest` | DELETE | `/context-server-action/{server_type}/action-name/{action_name}` | null |
| `Integrations\DeviceInsight\GetDeviceInsightRequest` | GET | `/device-insight` | `DeviceInsight` or null |
| `Integrations\DeviceInsight\CreateDeviceInsightRequest` | POST | `/device-insight` | `DeviceInsight` or null |
| `Integrations\EndpointContextServer\GetEndpointContextServersRequest` | GET | `/endpoint-context-server` | Collection of `EndpointContextServer` |
| `Integrations\EndpointContextServer\CreateEndpointContextServerRequest` | POST | `/endpoint-context-server` | `EndpointContextServer` or null |
| `Integrations\EndpointContextServer\GetEndpointContextServerRequest` | GET | `/endpoint-context-server/{endpoint_context_server_id}` | `EndpointContextServer` or null |
| `Integrations\EndpointContextServer\UpdateEndpointContextServerRequest` | PATCH | `/endpoint-context-server/{endpoint_context_server_id}` | `EndpointContextServer` or null |
| `Integrations\EndpointContextServer\ReplaceEndpointContextServerRequest` | PUT | `/endpoint-context-server/{endpoint_context_server_id}` | `EndpointContextServer` or null |
| `Integrations\EndpointContextServer\DeleteEndpointContextServerRequest` | DELETE | `/endpoint-context-server/{endpoint_context_server_id}` | null |
| `Integrations\EndpointContextServer\GetEndpointContextServerByServerNameRequest` | GET | `/endpoint-context-server/server-name/{server_name}` | `EndpointContextServer` or null |
| `Integrations\EndpointContextServer\UpdateEndpointContextServerByServerNameRequest` | PATCH | `/endpoint-context-server/server-name/{server_name}` | `EndpointContextServer` or null |
| `Integrations\EndpointContextServer\ReplaceEndpointContextServerByServerNameRequest` | PUT | `/endpoint-context-server/server-name/{server_name}` | `EndpointContextServer` or null |
| `Integrations\EndpointContextServer\DeleteEndpointContextServerByServerNameRequest` | DELETE | `/endpoint-context-server/server-name/{server_name}` | null |
| `Integrations\EndpointContextServer\TriggerPollEndpointContextServerRequest` | PATCH | `/endpoint-context-server/{endpoint_context_server_id}/trigger-poll` | `EndpointContextServer` or null |
| `Integrations\EndpointContextServer\TriggerPollEndpointContextServerByServerNameRequest` | PATCH | `/endpoint-context-server/server-name/{server_name}/trigger-poll` | `EndpointContextServer` or null |
| `Integrations\EventSources\GetEventSourcesRequest` | GET | `/event-sources` | Collection of `EventSources` |
| `Integrations\EventSources\CreateEventSourceRequest` | POST | `/event-sources` | `EventSources` or null |
| `Integrations\EventSources\GetEventSourceRequest` | GET | `/event-sources/{event_sources_id}` | `EventSources` or null |
| `Integrations\EventSources\UpdateEventSourceRequest` | PATCH | `/event-sources/{event_sources_id}` | `EventSources` or null |
| `Integrations\EventSources\ReplaceEventSourceRequest` | PUT | `/event-sources/{event_sources_id}` | `EventSources` or null |
| `Integrations\EventSources\DeleteEventSourceRequest` | DELETE | `/event-sources/{event_sources_id}` | null |
| `Integrations\EventSources\GetEventSourceByNameRequest` | GET | `/event-sources/name/{name}` | `EventSources` or null |
| `Integrations\EventSources\UpdateEventSourceByNameRequest` | PATCH | `/event-sources/name/{name}` | `EventSources` or null |
| `Integrations\EventSources\ReplaceEventSourceByNameRequest` | PUT | `/event-sources/name/{name}` | `EventSources` or null |
| `Integrations\EventSources\DeleteEventSourceByNameRequest` | DELETE | `/event-sources/name/{name}` | null |
| `Integrations\ExtensionInstance\GetExtensionInstancesRequest` | GET | `/extension/instance` | Collection of `ExtensionInstance` |
| `Integrations\ExtensionInstance\CreateExtensionInstanceRequest` | POST | `/extension/instance` | `ExtensionInstance` or null |
| `Integrations\ExtensionInstance\GetExtensionInstanceRequest` | GET | `/extension/instance/{id}` | `ExtensionInstance` or null |
| `Integrations\ExtensionInstance\UpdateExtensionInstanceRequest` | PATCH | `/extension/instance/{id}` | `ExtensionInstance` or null |
| `Integrations\ExtensionInstance\DeleteExtensionInstanceRequest` | DELETE | `/extension/instance/{id}` | null |
| `Integrations\ExtensionInstanceConfig\GetExtensionInstanceConfigRequest` | GET | `/extension/instance/{id}/config` | `ExtensionInstanceConfig` or null |
| `Integrations\ExtensionInstanceConfig\ReplaceExtensionInstanceConfigRequest` | PUT | `/extension/instance/{id}/config` | `ExtensionInstanceConfig` or null |
| `Integrations\ExtensionInstanceLog\GetExtensionInstanceLogRequest` | GET | `/extension/instance/{id}/log` | `ExtensionInstanceLog` or null |
| `Integrations\ExtensionInstanceReinstall\ReinstallExtensionInstanceRequest` | POST | `/extension/instance/{id}/reinstall` | `ExtensionInstance` or null |
| `Integrations\ExtensionInstanceRestart\RestartExtensionInstanceRequest` | POST | `/extension/instance/{id}/restart` | null |
| `Integrations\ExtensionInstanceStart\StartExtensionInstanceRequest` | POST | `/extension/instance/{id}/start` | null |
| `Integrations\ExtensionInstanceStop\StopExtensionInstanceRequest` | POST | `/extension/instance/{id}/stop` | null |
| `Integrations\ExtensionInstanceUpgrade\GetExtensionInstanceUpgradeRequest` | GET | `/extension/instance/{id}/upgrade` | `ExtensionInstance` or null |
| `Integrations\ExtensionInstanceUpgrade\UpgradeExtensionInstanceRequest` | POST | `/extension/instance/{id}/upgrade` | `ExtensionInstance` or null |
| `Integrations\ExtensionStore\GetExtensionStoresRequest` | GET | `/extension/store` | Collection of `ExtensionStore` |
| `Integrations\ExtensionStore\GetExtensionStoreRequest` | GET | `/extension/store/{id}` | `ExtensionStore` or null |
| `Integrations\IngressEventDictionary\GetIngressEventDictionariesRequest` | GET | `/ingress-event-dictionary` | Collection of `IngressEventDictionary` |
| `Integrations\IngressEventDictionary\CreateIngressEventDictionaryRequest` | POST | `/ingress-event-dictionary` | `IngressEventDictionary` or null |
| `Integrations\IngressEventDictionary\GetIngressEventDictionaryRequest` | GET | `/ingress-event-dictionary/{ingress_event_dictionary_id}` | `IngressEventDictionary` or null |
| `Integrations\IngressEventDictionary\UpdateIngressEventDictionaryRequest` | PATCH | `/ingress-event-dictionary/{ingress_event_dictionary_id}` | `IngressEventDictionary` or null |
| `Integrations\IngressEventDictionary\ReplaceIngressEventDictionaryRequest` | PUT | `/ingress-event-dictionary/{ingress_event_dictionary_id}` | `IngressEventDictionary` or null |
| `Integrations\IngressEventDictionary\DeleteIngressEventDictionaryRequest` | DELETE | `/ingress-event-dictionary/{ingress_event_dictionary_id}` | null |
| `Integrations\IngressEventDictionary\GetIngressEventDictionaryByFormatNameRequest` | GET | `/ingress-event-dictionary/format_name/{format_name}` | `IngressEventDictionary` or null |
| `Integrations\IngressEventDictionary\UpdateIngressEventDictionaryByFormatNameRequest` | PATCH | `/ingress-event-dictionary/format_name/{format_name}` | `IngressEventDictionary` or null |
| `Integrations\IngressEventDictionary\ReplaceIngressEventDictionaryByFormatNameRequest` | PUT | `/ingress-event-dictionary/format_name/{format_name}` | `IngressEventDictionary` or null |
| `Integrations\IngressEventDictionary\DeleteIngressEventDictionaryByFormatNameRequest` | DELETE | `/ingress-event-dictionary/format_name/{format_name}` | null |
| `Integrations\SyslogExportFilter\GetSyslogExportFiltersRequest` | GET | `/syslog-export-filter` | Collection of `SyslogExportFilter` |
| `Integrations\SyslogExportFilter\CreateSyslogExportFilterRequest` | POST | `/syslog-export-filter` | `SyslogExportFilter` or null |
| `Integrations\SyslogExportFilter\GetSyslogExportFilterRequest` | GET | `/syslog-export-filter/{syslog_export_filter_id}` | `SyslogExportFilter` or null |
| `Integrations\SyslogExportFilter\UpdateSyslogExportFilterRequest` | PATCH | `/syslog-export-filter/{syslog_export_filter_id}` | `SyslogExportFilter` or null |
| `Integrations\SyslogExportFilter\ReplaceSyslogExportFilterRequest` | PUT | `/syslog-export-filter/{syslog_export_filter_id}` | `SyslogExportFilter` or null |
| `Integrations\SyslogExportFilter\DeleteSyslogExportFilterRequest` | DELETE | `/syslog-export-filter/{syslog_export_filter_id}` | null |
| `Integrations\SyslogExportFilter\GetSyslogExportFilterByNameRequest` | GET | `/syslog-export-filter/name/{name}` | `SyslogExportFilter` or null |
| `Integrations\SyslogExportFilter\UpdateSyslogExportFilterByNameRequest` | PATCH | `/syslog-export-filter/name/{name}` | `SyslogExportFilter` or null |
| `Integrations\SyslogExportFilter\ReplaceSyslogExportFilterByNameRequest` | PUT | `/syslog-export-filter/name/{name}` | `SyslogExportFilter` or null |
| `Integrations\SyslogExportFilter\DeleteSyslogExportFilterByNameRequest` | DELETE | `/syslog-export-filter/name/{name}` | null |
| `Integrations\SyslogTarget\GetSyslogTargetsRequest` | GET | `/syslog-target` | Collection of `SyslogTarget` |
| `Integrations\SyslogTarget\CreateSyslogTargetRequest` | POST | `/syslog-target` | `SyslogTarget` or null |
| `Integrations\SyslogTarget\GetSyslogTargetRequest` | GET | `/syslog-target/{syslog_target_id}` | `SyslogTarget` or null |
| `Integrations\SyslogTarget\UpdateSyslogTargetRequest` | PATCH | `/syslog-target/{syslog_target_id}` | `SyslogTarget` or null |
| `Integrations\SyslogTarget\ReplaceSyslogTargetRequest` | PUT | `/syslog-target/{syslog_target_id}` | `SyslogTarget` or null |
| `Integrations\SyslogTarget\DeleteSyslogTargetRequest` | DELETE | `/syslog-target/{syslog_target_id}` | null |
| `Integrations\SyslogTarget\GetSyslogTargetByHostAddressRequest` | GET | `/syslog-target/host-address/{host_address}` | `SyslogTarget` or null |
| `Integrations\SyslogTarget\UpdateSyslogTargetByHostAddressRequest` | PATCH | `/syslog-target/host-address/{host_address}` | `SyslogTarget` or null |
| `Integrations\SyslogTarget\ReplaceSyslogTargetByHostAddressRequest` | PUT | `/syslog-target/host-address/{host_address}` | `SyslogTarget` or null |
| `Integrations\SyslogTarget\DeleteSyslogTargetByHostAddressRequest` | DELETE | `/syslog-target/host-address/{host_address}` | null |

## LocalServerConfiguration

`ClearPass::localServerConfiguration()`

| Call | Returns |
|---|---|
| `ClearPass::localServerConfiguration()->accessControls(...)` | a builder over `AccessControl` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `findByResourceName(...)`, `replaceByResourceName(...)`, `deleteByResourceName(...)` |
| `ClearPass::localServerConfiguration()->adDomains(...)` | a builder over `ADDomain` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `findByNetbiosName(...)`, `join(...)`, `leave(...)`, `updatePasswordServers(...)` |
| `ClearPass::localServerConfiguration()->cppmVersion()` | `CppmVersion` or null |
| `ClearPass::localServerConfiguration()->serverConfigurations()` | a builder over `ServerConfiguration` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `update()` |
| `ClearPass::localServerConfiguration()->serverFips()` | `ServerFipsResponse` or null |
| `ClearPass::localServerConfiguration()->serverSnmp(...)` | the setting as `ServerSnmp`: `get()`, `replace()`, `update()` |
| `ClearPass::localServerConfiguration()->serverVersion()` | `ServerVersionResponse` or null |
| `ClearPass::localServerConfiguration()->serviceParameter(...)` | the setting as `ServiceParameter`: `get()`, `update()` |
| `ClearPass::localServerConfiguration()->systemServiceControls(...)` | a builder over `SystemServiceControl` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `findByServiceName(...)`, `startByServiceName(...)`, `stopByServiceName(...)` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `LocalServerConfiguration\ADDomain\GetADDomainsRequest` | GET | `/ad-domain/{server_uuid}` | Collection of `ADDomain` |
| `LocalServerConfiguration\ADDomain\GetADDomainByNetbiosNameRequest` | GET | `/ad-domain/{server_uuid}/netbios-name/{netbios_name}` | `ADDomain` or null |
| `LocalServerConfiguration\ADDomain\JoinADDomainRequest` | PUT | `/ad-domain/join/{server_uuid}` | `ADDomainStatus` or null |
| `LocalServerConfiguration\ADDomain\LeaveADDomainRequest` | PUT | `/ad-domain/leave/{server_uuid}` | `ADDomainStatus` or null |
| `LocalServerConfiguration\ADDomain\UpdateADDomainPasswordServersRequest` | PATCH | `/ad-domain/password-servers/{server_uuid}` | `ADDomain` or null |
| `LocalServerConfiguration\AccessControl\GetAccessControlsRequest` | GET | `/server/access-control/{server_uuid}` | Collection of `AccessControl` |
| `LocalServerConfiguration\AccessControl\GetAccessControlByResourceNameRequest` | GET | `/server/access-control/{server_uuid}/{resource_name}` | `AccessControl` or null |
| `LocalServerConfiguration\AccessControl\ReplaceAccessControlByResourceNameRequest` | PUT | `/server/access-control/{server_uuid}/{resource_name}` | `AccessControl` or null |
| `LocalServerConfiguration\AccessControl\DeleteAccessControlByResourceNameRequest` | DELETE | `/server/access-control/{server_uuid}/{resource_name}` | null |
| `LocalServerConfiguration\CppmVersion\GetCppmVersionRequest` | GET | `/cppm-version` | `CppmVersion` or null |
| `LocalServerConfiguration\ServerConfiguration\GetServerConfigurationsRequest` | GET | `/cluster/server` | Collection of `ServerConfiguration` |
| `LocalServerConfiguration\ServerConfiguration\GetServerConfigurationRequest` | GET | `/cluster/server/{uuid}` | `ServerConfiguration` or null |
| `LocalServerConfiguration\ServerConfiguration\UpdateServerConfigurationRequest` | PATCH | `/cluster/server/{uuid}` | `ServerConfiguration` or null |
| `LocalServerConfiguration\ServerFips\GetServerFipsRequest` | GET | `/server/fips` | `ServerFipsResponse` or null |
| `LocalServerConfiguration\ServerSnmp\GetServerSnmpRequest` | GET | `/server/snmp/{server_uuid}` | `ServerSnmp` or null |
| `LocalServerConfiguration\ServerSnmp\ReplaceServerSnmpRequest` | PUT | `/server/snmp/{server_uuid}` | `ServerSnmp` or null |
| `LocalServerConfiguration\ServerSnmp\UpdateServerSnmpRequest` | PATCH | `/server/snmp/{server_uuid}` | `ServerSnmp` or null |
| `LocalServerConfiguration\ServerVersion\GetServerVersionRequest` | GET | `/server/version` | `ServerVersionResponse` or null |
| `LocalServerConfiguration\ServiceParameter\GetServiceParameterRequest` | GET | `/service-parameter/{server_uuid}/{service_id}` | `ServiceParameter` or null |
| `LocalServerConfiguration\ServiceParameter\UpdateServiceParameterRequest` | PATCH | `/service-parameter/{server_uuid}/{service_id}` | `ServiceParameterUpdate` or null |
| `LocalServerConfiguration\SystemServiceControl\GetSystemServiceControlsRequest` | GET | `/server/service/{server_uuid}` | Collection of `SystemServiceControl` |
| `LocalServerConfiguration\SystemServiceControl\GetSystemServiceByServiceNameRequest` | GET | `/server/service/{server_uuid}/{service_name}` | `SystemServiceControl` or null |
| `LocalServerConfiguration\SystemServiceControl\StartSystemServiceByServiceNameRequest` | PATCH | `/server/service/{server_uuid}/{service_name}/start` | `SystemServiceControl` or null |
| `LocalServerConfiguration\SystemServiceControl\StopSystemServiceByServiceNameRequest` | PATCH | `/server/service/{server_uuid}/{service_name}/stop` | `SystemServiceControl` or null |

## Logs

`ClearPass::logs()`

| Call | Returns |
|---|---|
| `ClearPass::logs()->endpointInfo()` | methods: `findByMac(...)`, `findByIp(...)`, `findByIpRange(...)`, `findByTimeRange(...)` |
| `ClearPass::logs()->loginAudit(...)` | `LoginAudit` or null |
| `ClearPass::logs()->systemEvents()` | the setting as `SystemEvents`: `get()`, `create()` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `Logs\EndpointInfo\GetEndpointInfoByMacRequest` | GET | `/insight/endpoint/mac/{mac}` | `EndpointInfo` or null |
| `Logs\EndpointInfo\GetEndpointInfoByIpRequest` | GET | `/insight/endpoint/ip/{ip}` | `EndpointInfo` or null |
| `Logs\EndpointInfo\GetEndpointInfoByIpRangeRequest` | GET | `/insight/endpoint/ip-range/{ip_range}` | `EndpointInfo` or null |
| `Logs\EndpointInfo\GetEndpointInfoByTimeRangeRequest` | GET | `/insight/endpoint/time-range/{from_time}/{to_time}` | `EndpointInfo` or null |
| `Logs\LoginAudit\GetLoginAuditRequest` | GET | `/login-audit/{name}` | `LoginAudit` or null |
| `Logs\SystemEvents\GetSystemEventRequest` | GET | `/system-event` | `SystemEvents` or null |
| `Logs\SystemEvents\CreateSystemEventRequest` | POST | `/system-event` | `SystemEvents` or null |

## PlatformCertificates

`ClearPass::platformCertificates()`

| Call | Returns |
|---|---|
| `ClearPass::platformCertificates()->certTrustListDetails()` | a builder over `CertTrustListDetails` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)` |
| `ClearPass::platformCertificates()->certTrustLists()` | a builder over `CertTrustList` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `delete()` |
| `ClearPass::platformCertificates()->clientCerts()` | a builder over `ClientCert` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `delete()` |
| `ClearPass::platformCertificates()->createCertSigning(...)` | `CertSignRequest` or null |
| `ClearPass::platformCertificates()->createSelfSignedCert(...)` | `SelfSignedCert` or null |
| `ClearPass::platformCertificates()->revocationLists()` | a builder over `RevocationList` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `delete()` |
| `ClearPass::platformCertificates()->serverCerts()` | a builder over `ServerCert` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)`, `update()`, `findByName(...)`, `replaceByName(...)`, `enableByName(...)`, `disableByName(...)` |
| `ClearPass::platformCertificates()->serviceCerts()` | a builder over `ServiceCert` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `delete()` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `PlatformCertificates\CertSignRequest\CreateCertSigningRequest` | POST | `/cert-sign-request` | `CertSignRequest` or null |
| `PlatformCertificates\CertTrustList\GetCertTrustListsRequest` | GET | `/cert-trust-list` | Collection of `CertTrustList` |
| `PlatformCertificates\CertTrustList\CreateCertTrustListRequest` | POST | `/cert-trust-list` | `CertTrustList` or null |
| `PlatformCertificates\CertTrustList\GetCertTrustListRequest` | GET | `/cert-trust-list/{cert_trust_list_id}` | `CertTrustList` or null |
| `PlatformCertificates\CertTrustList\UpdateCertTrustListRequest` | PATCH | `/cert-trust-list/{cert_trust_list_id}` | `CertTrustList` or null |
| `PlatformCertificates\CertTrustList\DeleteCertTrustListRequest` | DELETE | `/cert-trust-list/{cert_trust_list_id}` | null |
| `PlatformCertificates\CertTrustListDetails\GetCertTrustListDetailsRequest` | GET | `/cert-trust-list-details` | Collection of `CertTrustListDetails` |
| `PlatformCertificates\CertTrustListDetails\GetCertTrustListDetailRequest` | GET | `/cert-trust-list-details/{cert_trust_list_details_id}` | `CertTrustListDetails` or null |
| `PlatformCertificates\ClientCert\GetClientCertsRequest` | GET | `/client-cert` | Collection of `ClientCert` |
| `PlatformCertificates\ClientCert\CreateClientCertRequest` | POST | `/client-cert` | `ClientCert` or null |
| `PlatformCertificates\ClientCert\GetClientCertRequest` | GET | `/client-cert/{client_cert_id}` | `ClientCert` or null |
| `PlatformCertificates\ClientCert\DeleteClientCertRequest` | DELETE | `/client-cert/{client_cert_id}` | null |
| `PlatformCertificates\RevocationList\GetRevocationListsRequest` | GET | `/revocation-list` | Collection of `RevocationList` |
| `PlatformCertificates\RevocationList\CreateRevocationListRequest` | POST | `/revocation-list` | `RevocationList` or null |
| `PlatformCertificates\RevocationList\GetRevocationListRequest` | GET | `/revocation-list/{revocation_list_id}` | `RevocationList` or null |
| `PlatformCertificates\RevocationList\UpdateRevocationListRequest` | PATCH | `/revocation-list/{revocation_list_id}` | `RevocationList` or null |
| `PlatformCertificates\RevocationList\DeleteRevocationListRequest` | DELETE | `/revocation-list/{revocation_list_id}` | null |
| `PlatformCertificates\SelfSignedCert\CreateSelfSignedCertRequest` | POST | `/self-signed-cert` | `SelfSignedCert` or null |
| `PlatformCertificates\ServerCert\GetServerCertsRequest` | GET | `/server-cert` | Collection of `ServerCert` |
| `PlatformCertificates\ServerCert\GetServerCertRequest` | GET | `/server-cert/{service_id}` | `ServerCert` or null |
| `PlatformCertificates\ServerCert\UpdateServerCertRequest` | PATCH | `/server-cert/{service_id}` | `ServerCert` or null |
| `PlatformCertificates\ServerCert\GetServerCertByNameRequest` | GET | `/server-cert/name/{server_uuid}/{service_name}` | `ServerCert` or null |
| `PlatformCertificates\ServerCert\ReplaceServerCertByNameRequest` | PUT | `/server-cert/name/{server_uuid}/{service_name}` | `ServerCert` or null |
| `PlatformCertificates\ServerCert\EnableServerCertByNameRequest` | PATCH | `/server-cert/name/{server_uuid}/{service_name}/enable` | `ServerCert` or null |
| `PlatformCertificates\ServerCert\DisableServerCertByNameRequest` | PATCH | `/server-cert/name/{server_uuid}/{service_name}/disable` | `ServerCert` or null |
| `PlatformCertificates\ServiceCert\GetServiceCertsRequest` | GET | `/service-cert` | Collection of `ServiceCert` |
| `PlatformCertificates\ServiceCert\CreateServiceCertRequest` | POST | `/service-cert` | `ServiceCert` or null |
| `PlatformCertificates\ServiceCert\GetServiceCertRequest` | GET | `/service-cert/{service_cert_id}` | `ServiceCert` or null |
| `PlatformCertificates\ServiceCert\DeleteServiceCertRequest` | DELETE | `/service-cert/{service_cert_id}` | null |

## PolicyElements

`ClearPass::policyElements()`

| Call | Returns |
|---|---|
| `ClearPass::policyElements()->applicationDictionaries()` | a builder over `ApplicationDictionary` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::policyElements()->authMethods()` | a builder over `AuthMethod` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::policyElements()->authSources()` | a builder over `AuthSource` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::policyElements()->enforcementPolicies()` | a builder over `EnforcementPolicy` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::policyElements()->networkDeviceGroups()` | a builder over `NetworkDeviceGroup` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::policyElements()->networkDevices()` | a builder over `NetworkDevice` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::policyElements()->posturePolicies()` | a builder over `PosturePolicy` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::policyElements()->radiusDictionaries()` | a builder over `RADIUSDictionary` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `enable(...)`, `disable(...)`, `enableByName(...)`, `disableByName(...)` |
| `ClearPass::policyElements()->radiusDynamicAuthorizationTemplates()` | a builder over `RADIUSDynamicAuthorizationTemplate` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::policyElements()->radiusProxyTargets()` | a builder over `RADIUSProxyTarget` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::policyElements()->roleMappings()` | a builder over `RoleMapping` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::policyElements()->roles()` | a builder over `Role` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |
| `ClearPass::policyElements()->services()` | a builder over `Service` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)`, `enable(...)`, `enableByName(...)`, `disable(...)`, `disableByName(...)`, `reorder(...)` |
| `ClearPass::policyElements()->tacacsServiceDictionaries()` | a builder over `TACACSServiceDictionary` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `create()`, `find($id)`, `update()`, `replace()`, `delete()`, `findByName(...)`, `updateByName(...)`, `replaceByName(...)`, `deleteByName(...)` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `PolicyElements\ApplicationDictionary\GetApplicationDictionariesRequest` | GET | `/application-dictionary` | Collection of `ApplicationDictionary` |
| `PolicyElements\ApplicationDictionary\CreateApplicationDictionaryRequest` | POST | `/application-dictionary` | `ApplicationDictionary` or null |
| `PolicyElements\ApplicationDictionary\GetApplicationDictionaryRequest` | GET | `/application-dictionary/{application_dictionary_id}` | `ApplicationDictionary` or null |
| `PolicyElements\ApplicationDictionary\UpdateApplicationDictionaryRequest` | PATCH | `/application-dictionary/{application_dictionary_id}` | `ApplicationDictionary` or null |
| `PolicyElements\ApplicationDictionary\ReplaceApplicationDictionaryRequest` | PUT | `/application-dictionary/{application_dictionary_id}` | `ApplicationDictionary` or null |
| `PolicyElements\ApplicationDictionary\DeleteApplicationDictionaryRequest` | DELETE | `/application-dictionary/{application_dictionary_id}` | null |
| `PolicyElements\ApplicationDictionary\GetApplicationDictionaryByNameRequest` | GET | `/application-dictionary/name/{name}` | `ApplicationDictionary` or null |
| `PolicyElements\ApplicationDictionary\UpdateApplicationDictionaryByNameRequest` | PATCH | `/application-dictionary/name/{name}` | `ApplicationDictionary` or null |
| `PolicyElements\ApplicationDictionary\ReplaceApplicationDictionaryByNameRequest` | PUT | `/application-dictionary/name/{name}` | `ApplicationDictionary` or null |
| `PolicyElements\ApplicationDictionary\DeleteApplicationDictionaryByNameRequest` | DELETE | `/application-dictionary/name/{name}` | null |
| `PolicyElements\AuthMethod\GetAuthMethodsRequest` | GET | `/auth-method` | Collection of `AuthMethod` |
| `PolicyElements\AuthMethod\CreateAuthMethodRequest` | POST | `/auth-method` | `AuthMethod` or null |
| `PolicyElements\AuthMethod\GetAuthMethodRequest` | GET | `/auth-method/{auth_method_id}` | `AuthMethod` or null |
| `PolicyElements\AuthMethod\UpdateAuthMethodRequest` | PATCH | `/auth-method/{auth_method_id}` | `AuthMethod` or null |
| `PolicyElements\AuthMethod\ReplaceAuthMethodRequest` | PUT | `/auth-method/{auth_method_id}` | `AuthMethod` or null |
| `PolicyElements\AuthMethod\DeleteAuthMethodRequest` | DELETE | `/auth-method/{auth_method_id}` | null |
| `PolicyElements\AuthMethod\GetAuthMethodByNameRequest` | GET | `/auth-method/name/{name}` | `AuthMethod` or null |
| `PolicyElements\AuthMethod\UpdateAuthMethodByNameRequest` | PATCH | `/auth-method/name/{name}` | `AuthMethod` or null |
| `PolicyElements\AuthMethod\ReplaceAuthMethodByNameRequest` | PUT | `/auth-method/name/{name}` | `AuthMethod` or null |
| `PolicyElements\AuthMethod\DeleteAuthMethodByNameRequest` | DELETE | `/auth-method/name/{name}` | null |
| `PolicyElements\AuthSource\GetAuthSourcesRequest` | GET | `/auth-source` | Collection of `AuthSource` |
| `PolicyElements\AuthSource\CreateAuthSourceRequest` | POST | `/auth-source` | `AuthSource` or null |
| `PolicyElements\AuthSource\GetAuthSourceRequest` | GET | `/auth-source/{auth_source_id}` | `AuthSource` or null |
| `PolicyElements\AuthSource\UpdateAuthSourceRequest` | PATCH | `/auth-source/{auth_source_id}` | `AuthSource` or null |
| `PolicyElements\AuthSource\ReplaceAuthSourceRequest` | PUT | `/auth-source/{auth_source_id}` | `AuthSource` or null |
| `PolicyElements\AuthSource\DeleteAuthSourceRequest` | DELETE | `/auth-source/{auth_source_id}` | null |
| `PolicyElements\AuthSource\GetAuthSourceByNameRequest` | GET | `/auth-source/name/{name}` | `AuthSource` or null |
| `PolicyElements\AuthSource\UpdateAuthSourceByNameRequest` | PATCH | `/auth-source/name/{name}` | `AuthSource` or null |
| `PolicyElements\AuthSource\ReplaceAuthSourceByNameRequest` | PUT | `/auth-source/name/{name}` | `AuthSource` or null |
| `PolicyElements\AuthSource\DeleteAuthSourceByNameRequest` | DELETE | `/auth-source/name/{name}` | null |
| `PolicyElements\EnforcementPolicy\GetEnforcementPoliciesRequest` | GET | `/enforcement-policy` | Collection of `EnforcementPolicy` |
| `PolicyElements\EnforcementPolicy\CreateEnforcementPolicyRequest` | POST | `/enforcement-policy` | `EnforcementPolicy` or null |
| `PolicyElements\EnforcementPolicy\GetEnforcementPolicyRequest` | GET | `/enforcement-policy/{enforcement_policy_id}` | `EnforcementPolicy` or null |
| `PolicyElements\EnforcementPolicy\UpdateEnforcementPolicyRequest` | PATCH | `/enforcement-policy/{enforcement_policy_id}` | `EnforcementPolicy` or null |
| `PolicyElements\EnforcementPolicy\ReplaceEnforcementPolicyRequest` | PUT | `/enforcement-policy/{enforcement_policy_id}` | `EnforcementPolicy` or null |
| `PolicyElements\EnforcementPolicy\DeleteEnforcementPolicyRequest` | DELETE | `/enforcement-policy/{enforcement_policy_id}` | null |
| `PolicyElements\EnforcementPolicy\GetEnforcementPolicyByNameRequest` | GET | `/enforcement-policy/name/{name}` | `EnforcementPolicy` or null |
| `PolicyElements\EnforcementPolicy\UpdateEnforcementPolicyByNameRequest` | PATCH | `/enforcement-policy/name/{name}` | `EnforcementPolicy` or null |
| `PolicyElements\EnforcementPolicy\ReplaceEnforcementPolicyByNameRequest` | PUT | `/enforcement-policy/name/{name}` | `EnforcementPolicy` or null |
| `PolicyElements\EnforcementPolicy\DeleteEnforcementPolicyByNameRequest` | DELETE | `/enforcement-policy/name/{name}` | null |
| `PolicyElements\NetworkDevice\GetNetworkDevicesRequest` | GET | `/network-device` | Collection of `NetworkDevice` |
| `PolicyElements\NetworkDevice\CreateNetworkDeviceRequest` | POST | `/network-device` | `NetworkDevice` or null |
| `PolicyElements\NetworkDevice\GetNetworkDeviceRequest` | GET | `/network-device/{network_device_id}` | `NetworkDevice` or null |
| `PolicyElements\NetworkDevice\UpdateNetworkDeviceRequest` | PATCH | `/network-device/{network_device_id}` | `NetworkDevice` or null |
| `PolicyElements\NetworkDevice\ReplaceNetworkDeviceRequest` | PUT | `/network-device/{network_device_id}` | `NetworkDevice` or null |
| `PolicyElements\NetworkDevice\DeleteNetworkDeviceRequest` | DELETE | `/network-device/{network_device_id}` | null |
| `PolicyElements\NetworkDevice\GetNetworkDeviceByNameRequest` | GET | `/network-device/name/{name}` | `NetworkDevice` or null |
| `PolicyElements\NetworkDevice\UpdateNetworkDeviceByNameRequest` | PATCH | `/network-device/name/{name}` | `NetworkDevice` or null |
| `PolicyElements\NetworkDevice\ReplaceNetworkDeviceByNameRequest` | PUT | `/network-device/name/{name}` | `NetworkDevice` or null |
| `PolicyElements\NetworkDevice\DeleteNetworkDeviceByNameRequest` | DELETE | `/network-device/name/{name}` | null |
| `PolicyElements\NetworkDeviceGroup\GetNetworkDeviceGroupsRequest` | GET | `/network-device-group` | Collection of `NetworkDeviceGroup` |
| `PolicyElements\NetworkDeviceGroup\CreateNetworkDeviceGroupRequest` | POST | `/network-device-group` | `NetworkDeviceGroup` or null |
| `PolicyElements\NetworkDeviceGroup\GetNetworkDeviceGroupRequest` | GET | `/network-device-group/{network_device_group_id}` | `NetworkDeviceGroup` or null |
| `PolicyElements\NetworkDeviceGroup\UpdateNetworkDeviceGroupRequest` | PATCH | `/network-device-group/{network_device_group_id}` | `NetworkDeviceGroup` or null |
| `PolicyElements\NetworkDeviceGroup\ReplaceNetworkDeviceGroupRequest` | PUT | `/network-device-group/{network_device_group_id}` | `NetworkDeviceGroup` or null |
| `PolicyElements\NetworkDeviceGroup\DeleteNetworkDeviceGroupRequest` | DELETE | `/network-device-group/{network_device_group_id}` | null |
| `PolicyElements\NetworkDeviceGroup\GetNetworkDeviceGroupByNameRequest` | GET | `/network-device-group/name/{name}` | `NetworkDeviceGroup` or null |
| `PolicyElements\NetworkDeviceGroup\UpdateNetworkDeviceGroupByNameRequest` | PATCH | `/network-device-group/name/{name}` | `NetworkDeviceGroup` or null |
| `PolicyElements\NetworkDeviceGroup\ReplaceNetworkDeviceGroupByNameRequest` | PUT | `/network-device-group/name/{name}` | `NetworkDeviceGroup` or null |
| `PolicyElements\NetworkDeviceGroup\DeleteNetworkDeviceGroupByNameRequest` | DELETE | `/network-device-group/name/{name}` | null |
| `PolicyElements\PosturePolicy\GetPosturePoliciesRequest` | GET | `/posture-policy` | Collection of `PosturePolicy` |
| `PolicyElements\PosturePolicy\CreatePosturePolicyRequest` | POST | `/posture-policy` | `PosturePolicy` or null |
| `PolicyElements\PosturePolicy\GetPosturePolicyRequest` | GET | `/posture-policy/{posture_policy_id}` | `PosturePolicy` or null |
| `PolicyElements\PosturePolicy\UpdatePosturePolicyRequest` | PATCH | `/posture-policy/{posture_policy_id}` | `PosturePolicy` or null |
| `PolicyElements\PosturePolicy\ReplacePosturePolicyRequest` | PUT | `/posture-policy/{posture_policy_id}` | `PosturePolicy` or null |
| `PolicyElements\PosturePolicy\DeletePosturePolicyRequest` | DELETE | `/posture-policy/{posture_policy_id}` | null |
| `PolicyElements\PosturePolicy\GetPosturePolicyByNameRequest` | GET | `/posture-policy/name/{name}` | `PosturePolicy` or null |
| `PolicyElements\PosturePolicy\UpdatePosturePolicyByNameRequest` | PATCH | `/posture-policy/name/{name}` | `PosturePolicy` or null |
| `PolicyElements\PosturePolicy\ReplacePosturePolicyByNameRequest` | PUT | `/posture-policy/name/{name}` | `PosturePolicy` or null |
| `PolicyElements\PosturePolicy\DeletePosturePolicyByNameRequest` | DELETE | `/posture-policy/name/{name}` | null |
| `PolicyElements\RADIUSDictionary\GetRADIUSDictionariesRequest` | GET | `/radius-dictionary` | Collection of `RADIUSDictionary` |
| `PolicyElements\RADIUSDictionary\CreateRADIUSDictionaryRequest` | POST | `/radius-dictionary` | `RADIUSDictionary` or null |
| `PolicyElements\RADIUSDictionary\GetRADIUSDictionaryRequest` | GET | `/radius-dictionary/{radius_dictionary_id}` | `RADIUSDictionary` or null |
| `PolicyElements\RADIUSDictionary\UpdateRADIUSDictionaryRequest` | PATCH | `/radius-dictionary/{radius_dictionary_id}` | `RADIUSDictionary` or null |
| `PolicyElements\RADIUSDictionary\ReplaceRADIUSDictionaryRequest` | PUT | `/radius-dictionary/{radius_dictionary_id}` | `RADIUSDictionary` or null |
| `PolicyElements\RADIUSDictionary\GetRADIUSDictionaryByNameRequest` | GET | `/radius-dictionary/name/{name}` | `RADIUSDictionary` or null |
| `PolicyElements\RADIUSDictionary\UpdateRADIUSDictionaryByNameRequest` | PATCH | `/radius-dictionary/name/{name}` | `RADIUSDictionary` or null |
| `PolicyElements\RADIUSDictionary\ReplaceRADIUSDictionaryByNameRequest` | PUT | `/radius-dictionary/name/{name}` | `RADIUSDictionary` or null |
| `PolicyElements\RADIUSDictionary\EnableRADIUSDictionaryRequest` | PATCH | `/radius-dictionary/{radius_dictionary_id}/enable` | `RADIUSDictionary` or null |
| `PolicyElements\RADIUSDictionary\DisableRADIUSDictionaryRequest` | PATCH | `/radius-dictionary/{radius_dictionary_id}/disable` | `RADIUSDictionary` or null |
| `PolicyElements\RADIUSDictionary\EnableRADIUSDictionaryByNameRequest` | PATCH | `/radius-dictionary/name/{name}/enable` | `RADIUSDictionary` or null |
| `PolicyElements\RADIUSDictionary\DisableRADIUSDictionaryByNameRequest` | PATCH | `/radius-dictionary/name/{name}/disable` | `RADIUSDictionary` or null |
| `PolicyElements\RADIUSDynamicAuthorizationTemplate\GetRADIUSDynamicAuthorizationTemplatesRequest` | GET | `/radius-dynamic-authorization-template` | Collection of `RADIUSDynamicAuthorizationTemplate` |
| `PolicyElements\RADIUSDynamicAuthorizationTemplate\CreateRADIUSDynamicAuthorizationTemplateRequest` | POST | `/radius-dynamic-authorization-template` | `RADIUSDynamicAuthorizationTemplate` or null |
| `PolicyElements\RADIUSDynamicAuthorizationTemplate\GetRADIUSDynamicAuthorizationTemplateRequest` | GET | `/radius-dynamic-authorization-template/{radius_dynamic_authorization_template_id}` | `RADIUSDynamicAuthorizationTemplate` or null |
| `PolicyElements\RADIUSDynamicAuthorizationTemplate\UpdateRADIUSDynamicAuthorizationTemplateRequest` | PATCH | `/radius-dynamic-authorization-template/{radius_dynamic_authorization_template_id}` | `RADIUSDynamicAuthorizationTemplate` or null |
| `PolicyElements\RADIUSDynamicAuthorizationTemplate\ReplaceRADIUSDynamicAuthorizationTemplateRequest` | PUT | `/radius-dynamic-authorization-template/{radius_dynamic_authorization_template_id}` | `RADIUSDynamicAuthorizationTemplate` or null |
| `PolicyElements\RADIUSDynamicAuthorizationTemplate\DeleteRADIUSDynamicAuthorizationTemplateRequest` | DELETE | `/radius-dynamic-authorization-template/{radius_dynamic_authorization_template_id}` | null |
| `PolicyElements\RADIUSDynamicAuthorizationTemplate\GetRADIUSDynamicAuthorizationTemplateByNameRequest` | GET | `/radius-dynamic-authorization-template/name/{name}` | `RADIUSDynamicAuthorizationTemplate` or null |
| `PolicyElements\RADIUSDynamicAuthorizationTemplate\UpdateRADIUSDynamicAuthorizationTemplateByNameRequest` | PATCH | `/radius-dynamic-authorization-template/name/{name}` | `RADIUSDynamicAuthorizationTemplate` or null |
| `PolicyElements\RADIUSDynamicAuthorizationTemplate\ReplaceRADIUSDynamicAuthorizationTemplateByNameRequest` | PUT | `/radius-dynamic-authorization-template/name/{name}` | `RADIUSDynamicAuthorizationTemplate` or null |
| `PolicyElements\RADIUSDynamicAuthorizationTemplate\DeleteRADIUSDynamicAuthorizationTemplateByNameRequest` | DELETE | `/radius-dynamic-authorization-template/name/{name}` | null |
| `PolicyElements\RADIUSProxyTarget\GetRADIUSProxyTargetsRequest` | GET | `/proxy-target` | Collection of `RADIUSProxyTarget` |
| `PolicyElements\RADIUSProxyTarget\CreateRADIUSProxyTargetRequest` | POST | `/proxy-target` | `RADIUSProxyTarget` or null |
| `PolicyElements\RADIUSProxyTarget\GetRADIUSProxyTargetRequest` | GET | `/proxy-target/{proxy_target_id}` | `RADIUSProxyTarget` or null |
| `PolicyElements\RADIUSProxyTarget\UpdateRADIUSProxyTargetRequest` | PATCH | `/proxy-target/{proxy_target_id}` | `RADIUSProxyTarget` or null |
| `PolicyElements\RADIUSProxyTarget\ReplaceRADIUSProxyTargetRequest` | PUT | `/proxy-target/{proxy_target_id}` | `RADIUSProxyTarget` or null |
| `PolicyElements\RADIUSProxyTarget\DeleteRADIUSProxyTargetRequest` | DELETE | `/proxy-target/{proxy_target_id}` | null |
| `PolicyElements\RADIUSProxyTarget\GetRADIUSProxyTargetByNameRequest` | GET | `/proxy-target/name/{name}` | `RADIUSProxyTarget` or null |
| `PolicyElements\RADIUSProxyTarget\UpdateRADIUSProxyTargetByNameRequest` | PATCH | `/proxy-target/name/{name}` | `RADIUSProxyTarget` or null |
| `PolicyElements\RADIUSProxyTarget\ReplaceRADIUSProxyTargetByNameRequest` | PUT | `/proxy-target/name/{name}` | `RADIUSProxyTarget` or null |
| `PolicyElements\RADIUSProxyTarget\DeleteRADIUSProxyTargetByNameRequest` | DELETE | `/proxy-target/name/{name}` | null |
| `PolicyElements\Role\GetRolesRequest` | GET | `/role` | Collection of `Role` |
| `PolicyElements\Role\CreateRoleRequest` | POST | `/role` | `Role` or null |
| `PolicyElements\Role\GetRoleRequest` | GET | `/role/{role_id}` | `Role` or null |
| `PolicyElements\Role\UpdateRoleRequest` | PATCH | `/role/{role_id}` | `Role` or null |
| `PolicyElements\Role\ReplaceRoleRequest` | PUT | `/role/{role_id}` | `Role` or null |
| `PolicyElements\Role\DeleteRoleRequest` | DELETE | `/role/{role_id}` | null |
| `PolicyElements\Role\GetRoleByNameRequest` | GET | `/role/name/{name}` | `Role` or null |
| `PolicyElements\Role\UpdateRoleByNameRequest` | PATCH | `/role/name/{name}` | `Role` or null |
| `PolicyElements\Role\ReplaceRoleByNameRequest` | PUT | `/role/name/{name}` | `Role` or null |
| `PolicyElements\Role\DeleteRoleByNameRequest` | DELETE | `/role/name/{name}` | null |
| `PolicyElements\RoleMapping\GetRoleMappingsRequest` | GET | `/role-mapping` | Collection of `RoleMapping` |
| `PolicyElements\RoleMapping\CreateRoleMappingRequest` | POST | `/role-mapping` | `RoleMapping` or null |
| `PolicyElements\RoleMapping\GetRoleMappingRequest` | GET | `/role-mapping/{role_mapping_id}` | `RoleMapping` or null |
| `PolicyElements\RoleMapping\UpdateRoleMappingRequest` | PATCH | `/role-mapping/{role_mapping_id}` | `RoleMapping` or null |
| `PolicyElements\RoleMapping\ReplaceRoleMappingRequest` | PUT | `/role-mapping/{role_mapping_id}` | `RoleMapping` or null |
| `PolicyElements\RoleMapping\DeleteRoleMappingRequest` | DELETE | `/role-mapping/{role_mapping_id}` | null |
| `PolicyElements\RoleMapping\GetRoleMappingByNameRequest` | GET | `/role-mapping/name/{name}` | `RoleMapping` or null |
| `PolicyElements\RoleMapping\UpdateRoleMappingByNameRequest` | PATCH | `/role-mapping/name/{name}` | `RoleMapping` or null |
| `PolicyElements\RoleMapping\ReplaceRoleMappingByNameRequest` | PUT | `/role-mapping/name/{name}` | `RoleMapping` or null |
| `PolicyElements\RoleMapping\DeleteRoleMappingByNameRequest` | DELETE | `/role-mapping/name/{name}` | null |
| `PolicyElements\Service\GetServicesRequest` | GET | `/config/service` | Collection of `Service` |
| `PolicyElements\Service\CreateServiceRequest` | POST | `/config/service` | `Service` or null |
| `PolicyElements\Service\GetServiceRequest` | GET | `/config/service/{services_id}` | `Service` or null |
| `PolicyElements\Service\UpdateServiceRequest` | PATCH | `/config/service/{services_id}` | `Service` or null |
| `PolicyElements\Service\ReplaceServiceRequest` | PUT | `/config/service/{services_id}` | `Service` or null |
| `PolicyElements\Service\DeleteServiceRequest` | DELETE | `/config/service/{services_id}` | null |
| `PolicyElements\Service\GetServiceByNameRequest` | GET | `/config/service/name/{services_name}` | `Service` or null |
| `PolicyElements\Service\UpdateServiceByNameRequest` | PATCH | `/config/service/name/{services_name}` | `Service` or null |
| `PolicyElements\Service\ReplaceServiceByNameRequest` | PUT | `/config/service/name/{services_name}` | `Service` or null |
| `PolicyElements\Service\DeleteServiceByNameRequest` | DELETE | `/config/service/name/{services_name}` | null |
| `PolicyElements\Service\EnableServiceRequest` | PATCH | `/config/service/{services_id}/enable` | `Service` or null |
| `PolicyElements\Service\EnableServiceByNameRequest` | PATCH | `/config/service/name/{services_name}/enable` | `Service` or null |
| `PolicyElements\Service\DisableServiceRequest` | PATCH | `/config/service/{services_id}/disable` | `Service` or null |
| `PolicyElements\Service\DisableServiceByNameRequest` | PATCH | `/config/service/name/{services_name}/disable` | `Service` or null |
| `PolicyElements\Service\ReorderServicesRequest` | PATCH | `/config/service/reorder` | `ServiceReorder` or null |
| `PolicyElements\TACACSServiceDictionary\GetTACACSServiceDictionariesRequest` | GET | `/tacacs-service-dictionary` | Collection of `TACACSServiceDictionary` |
| `PolicyElements\TACACSServiceDictionary\CreateTACACSServiceDictionaryRequest` | POST | `/tacacs-service-dictionary` | `TACACSServiceDictionary` or null |
| `PolicyElements\TACACSServiceDictionary\GetTACACSServiceDictionaryRequest` | GET | `/tacacs-service-dictionary/{tacacs_service_dictionary_id}` | `TACACSServiceDictionary` or null |
| `PolicyElements\TACACSServiceDictionary\UpdateTACACSServiceDictionaryRequest` | PATCH | `/tacacs-service-dictionary/{tacacs_service_dictionary_id}` | `TACACSServiceDictionary` or null |
| `PolicyElements\TACACSServiceDictionary\ReplaceTACACSServiceDictionaryRequest` | PUT | `/tacacs-service-dictionary/{tacacs_service_dictionary_id}` | `TACACSServiceDictionary` or null |
| `PolicyElements\TACACSServiceDictionary\DeleteTACACSServiceDictionaryRequest` | DELETE | `/tacacs-service-dictionary/{tacacs_service_dictionary_id}` | null |
| `PolicyElements\TACACSServiceDictionary\GetTACACSServiceDictionaryByNameRequest` | GET | `/tacacs-service-dictionary/name/{name}` | `TACACSServiceDictionary` or null |
| `PolicyElements\TACACSServiceDictionary\UpdateTACACSServiceDictionaryByNameRequest` | PATCH | `/tacacs-service-dictionary/name/{name}` | `TACACSServiceDictionary` or null |
| `PolicyElements\TACACSServiceDictionary\ReplaceTACACSServiceDictionaryByNameRequest` | PUT | `/tacacs-service-dictionary/name/{name}` | `TACACSServiceDictionary` or null |
| `PolicyElements\TACACSServiceDictionary\DeleteTACACSServiceDictionaryByNameRequest` | DELETE | `/tacacs-service-dictionary/name/{name}` | null |

## SessionControl

`ClearPass::sessionControl()`

| Call | Returns |
|---|---|
| `ClearPass::sessionControl()->activeSessionReauthorize(...)` | the setting as `ReauthorizationProfiles`: `get()`, `reauthorize(...)` |
| `ClearPass::sessionControl()->activeSessions()` | a builder over `ActiveSession` records: `get()`, `first()`, `count()`, `all()`, `lazy()`, `find($id)` |
| `ClearPass::sessionControl()->disconnectActiveSession(...)` | `ActiveSessionAction` or null |
| `ClearPass::sessionControl()->sessionAction()` | methods: `disconnect(...)`, `disconnectByMac(...)`, `disconnectByUsername(...)`, `disconnectByIp(...)`, `coa(...)`, `coaByMac(...)`, `coaByUsername(...)`, `coaByIp(...)`, `find(...)` |

| Request | Method | Path | Returns |
|---|---|---|---|
| `SessionControl\ActiveSession\GetActiveSessionsRequest` | GET | `/session` | Collection of `ActiveSession` |
| `SessionControl\ActiveSession\GetActiveSessionRequest` | GET | `/session/{id}` | `ActiveSession` or null |
| `SessionControl\ActiveSessionDisconnect\DisconnectActiveSessionRequest` | POST | `/session/{id}/disconnect` | `ActiveSessionAction` or null |
| `SessionControl\ActiveSessionReauthorize\GetActiveSessionReauthorizeRequest` | GET | `/session/{id}/reauthorize` | `ReauthorizationProfiles` or null |
| `SessionControl\ActiveSessionReauthorize\ReauthorizeActiveSessionRequest` | POST | `/session/{id}/reauthorize` | `ActiveSessionAction` or null |
| `SessionControl\SessionAction\DisconnectSessionActionRequest` | POST | `/session-action/disconnect` | `SessionActionList` or null |
| `SessionControl\SessionAction\DisconnectSessionActionByMacRequest` | POST | `/session-action/disconnect/mac/{mac_address}` | `SessionActionList` or null |
| `SessionControl\SessionAction\DisconnectSessionActionByUsernameRequest` | POST | `/session-action/disconnect/username/{username}` | `SessionActionList` or null |
| `SessionControl\SessionAction\DisconnectSessionActionByIpRequest` | POST | `/session-action/disconnect/ip/{client_ip_address}` | `SessionActionList` or null |
| `SessionControl\SessionAction\CoaSessionActionRequest` | POST | `/session-action/coa` | `SessionActionList` or null |
| `SessionControl\SessionAction\CoaSessionActionByMacRequest` | POST | `/session-action/coa/mac/{mac_address}` | `SessionActionList` or null |
| `SessionControl\SessionAction\CoaSessionActionByUsernameRequest` | POST | `/session-action/coa/username/{username}` | `SessionActionList` or null |
| `SessionControl\SessionAction\CoaSessionActionByIpRequest` | POST | `/session-action/coa/ip/{client_ip_address}` | `SessionActionList` or null |
| `SessionControl\SessionAction\GetSessionActionRequest` | GET | `/session-action/{action_id}` | `SessionActionList` or null |

## ToolsAndUtilities

`ClearPass::toolsAndUtilities()`

| Call | Returns |
|---|---|
| `ClearPass::toolsAndUtilities()->randomMpskGenerator()` | the setting as `RandomMpskGeneratorResponse`: `get()`, `generate(...)` |
| `ClearPass::toolsAndUtilities()->randomPasswordGenerator()` | the setting as `RandomPasswordGeneratorResponse`: `get()`, `generate(...)` |
| `ClearPass::toolsAndUtilities()->sendEmail(...)` | `EmailSend` or null |
| `ClearPass::toolsAndUtilities()->sendSms(...)` | `SmsSendResponse` or null |

| Request | Method | Path | Returns |
|---|---|---|---|
| `ToolsAndUtilities\EmailSend\SendEmailRequest` | POST | `/email/send` | `EmailSend` or null |
| `ToolsAndUtilities\RandomMpskGenerator\GetRandomMpskRequest` | GET | `/random-mpsk` | `RandomMpskGeneratorResponse` or null |
| `ToolsAndUtilities\RandomMpskGenerator\GenerateRandomMpskRequest` | POST | `/random-mpsk` | `RandomMpskGeneratorResponse` or null |
| `ToolsAndUtilities\RandomPasswordGenerator\GetRandomPasswordRequest` | GET | `/random-password` | `RandomPasswordGeneratorResponse` or null |
| `ToolsAndUtilities\RandomPasswordGenerator\GenerateRandomPasswordRequest` | POST | `/random-password` | `RandomPasswordGeneratorResponse` or null |
| `ToolsAndUtilities\SmsSend\SendSmsRequest` | POST | `/sms/send` | `SmsSendResponse` or null |
