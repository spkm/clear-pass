<?php

namespace spkm\ClearPass\Resources\GlobalServerConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\GlobalServerConfiguration\ClusterDbSyncResponse;
use spkm\ClearPass\Data\GlobalServerConfiguration\ListAllPrivileges;
use spkm\ClearPass\Requests\GlobalServerConfiguration\ClusterDbSync\SyncClusterDatabaseRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\ListAllPrivileges\ListAllPrivilegesRequest;
use spkm\ClearPass\Resources\BaseResource;

/**
 * The GlobalServerConfiguration API: ClearPass::globalServerConfiguration().
 *
 * @extends BaseResource<Data>
 */
class GlobalServerConfigurationResources extends BaseResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Manage admin privileges.
     */
    public function adminPrivileges(): AdminPrivilegeResource
    {
        return new AdminPrivilegeResource($this->connector);
    }

    /**
     * Manage admin user password policies.
     */
    public function adminUserPasswordPolicy(): AdminUserPasswordPolicyResource
    {
        return new AdminUserPasswordPolicyResource($this->connector);
    }

    /**
     * Manage admin users.
     */
    public function adminUsers(): AdminUserResource
    {
        return new AdminUserResource($this->connector);
    }

    /**
     * Manage application license.
     */
    public function applicationLicenses(): ApplicationLicenseResource
    {
        return new ApplicationLicenseResource($this->connector);
    }

    /**
     * Manage Attributes.
     */
    public function attributes(): AttributeResource
    {
        return new AttributeResource($this->connector);
    }

    /**
     * Manage ClearPass portal.
     */
    public function clearPassPortal(): ClearPassPortalResource
    {
        return new ClearPassPortalResource($this->connector);
    }

    /**
     * Manage cluster wide parameters.
     */
    public function clusterWideParameter(): ClusterWideParameterResource
    {
        return new ClusterWideParameterResource($this->connector);
    }

    /**
     * Manage data filters.
     */
    public function dataFilters(): DataFilterResource
    {
        return new DataFilterResource($this->connector);
    }

    /**
     * Manage file backup server.
     */
    public function fileBackupServers(): FileBackupServerResource
    {
        return new FileBackupServerResource($this->connector);
    }

    /**
     * Returns the list of system-defined privileges: GET /oauth/all-privileges.
     *
     * @param  array<string, mixed>  $options  Query options: format
     */
    public function listAllPrivileges(array $options = []): ?ListAllPrivileges
    {
        return $this->fetch(new ListAllPrivilegesRequest($options));
    }

    /**
     * Manage local user password policies.
     */
    public function localUserPasswordPolicy(): LocalUserPasswordPolicyResource
    {
        return new LocalUserPasswordPolicyResource($this->connector);
    }

    /**
     * Operations for MessagingSetup.
     */
    public function messagingSetup(): MessagingSetupResource
    {
        return new MessagingSetupResource($this->connector);
    }

    /**
     * Manage operator profiles.
     */
    public function operatorProfiles(): OperatorProfileResource
    {
        return new OperatorProfileResource($this->connector);
    }

    /**
     * Manage Policy Manager Zones.
     */
    public function policyManagerZones(): PolicyManagerZoneResource
    {
        return new PolicyManagerZoneResource($this->connector);
    }

    /**
     * Manage Snmp Trap Receiver.
     */
    public function snmpTrapReceivers(): SnmpTrapReceiverResource
    {
        return new SnmpTrapReceiverResource($this->connector);
    }

    /**
     * Synchronize subscriber with the publisher: POST /cluster/db-sync.
     *
     * @param  array<string, mixed>|Data  $body
     * @param  array<string, mixed>  $options
     */
    public function syncClusterDatabase(array|Data $body = [], array $options = []): ?ClusterDbSyncResponse
    {
        return $this->fetch(new SyncClusterDatabaseRequest($this->payloadOf($body), $options));
    }
}
