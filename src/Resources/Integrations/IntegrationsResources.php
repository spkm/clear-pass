<?php

namespace spkm\ClearPass\Resources\Integrations;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\Integrations\ExtensionInstance;
use spkm\ClearPass\Data\Integrations\ExtensionInstanceLog;
use spkm\ClearPass\Requests\Integrations\ExtensionInstanceLog\GetExtensionInstanceLogRequest;
use spkm\ClearPass\Requests\Integrations\ExtensionInstanceReinstall\ReinstallExtensionInstanceRequest;
use spkm\ClearPass\Requests\Integrations\ExtensionInstanceRestart\RestartExtensionInstanceRequest;
use spkm\ClearPass\Requests\Integrations\ExtensionInstanceStart\StartExtensionInstanceRequest;
use spkm\ClearPass\Requests\Integrations\ExtensionInstanceStop\StopExtensionInstanceRequest;
use spkm\ClearPass\Resources\BaseResource;

/**
 * The Integrations API: ClearPass::integrations().
 *
 * @extends BaseResource<Data>
 */
class IntegrationsResources extends BaseResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Manage Context Server Actions.
     */
    public function contextServerActions(): ContextServerActionResource
    {
        return new ContextServerActionResource($this->connector);
    }

    /**
     * Manage Device Insight Integration.
     */
    public function deviceInsight(): DeviceInsightResource
    {
        return new DeviceInsightResource($this->connector);
    }

    /**
     * Manage Endpoint Context servers.
     */
    public function endpointContextServers(): EndpointContextServerResource
    {
        return new EndpointContextServerResource($this->connector);
    }

    /**
     * Manage event sources.
     */
    public function eventSources(): EventSourcesResource
    {
        return new EventSourcesResource($this->connector);
    }

    /**
     * Configure an installed extension.
     */
    public function extensionInstanceConfig(int|string $id): ExtensionInstanceConfigResource
    {
        return new ExtensionInstanceConfigResource($this->connector, $id);
    }

    /**
     * Get the log output from an installed extension: GET /extension/instance/{id}/log.
     *
     * @param  array<string, mixed>  $options  Query options: stdout, stderr, since, timestamps, tail
     */
    public function extensionInstanceLog(int|string $id, array $options = []): ?ExtensionInstanceLog
    {
        return $this->fetch(new GetExtensionInstanceLogRequest($id, $options));
    }

    /**
     * Upgrade an extension.
     */
    public function extensionInstanceUpgrade(int|string $id): ExtensionInstanceUpgradeResource
    {
        return new ExtensionInstanceUpgradeResource($this->connector, $id);
    }

    /**
     * Manage the system’s installed extensions.
     */
    public function extensionInstances(): ExtensionInstanceResource
    {
        return new ExtensionInstanceResource($this->connector);
    }

    /**
     * Query the extension store.
     */
    public function extensionStores(): ExtensionStoreResource
    {
        return new ExtensionStoreResource($this->connector);
    }

    /**
     * Manage Ingress Event Dictionaries.
     */
    public function ingressEventDictionaries(): IngressEventDictionaryResource
    {
        return new IngressEventDictionaryResource($this->connector);
    }

    /**
     * Reinstall an extension: POST /extension/instance/{id}/reinstall.
     *
     * @param  array<string, mixed>|Data  $body
     * @param  array<string, mixed>  $options
     */
    public function reinstallExtensionInstance(int|string $id, array|Data $body = [], array $options = []): ?ExtensionInstance
    {
        return $this->fetch(new ReinstallExtensionInstanceRequest($id, $this->payloadOf($body), $options));
    }

    /**
     * Restart an installed extension: POST /extension/instance/{id}/restart.
     *
     * @param  array<string, mixed>  $options
     * @return array<string, mixed>|null
     */
    public function restartExtensionInstance(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new RestartExtensionInstanceRequest($id, $options));
    }

    /**
     * Start an installed extension: POST /extension/instance/{id}/start.
     *
     * @param  array<string, mixed>  $options
     * @return array<string, mixed>|null
     */
    public function startExtensionInstance(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new StartExtensionInstanceRequest($id, $options));
    }

    /**
     * Stop an installed extension: POST /extension/instance/{id}/stop.
     *
     * @param  array<string, mixed>  $options
     * @return array<string, mixed>|null
     */
    public function stopExtensionInstance(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new StopExtensionInstanceRequest($id, $options));
    }

    /**
     * Manage syslog export filter.
     */
    public function syslogExportFilters(): SyslogExportFilterResource
    {
        return new SyslogExportFilterResource($this->connector);
    }

    /**
     * Manage syslog target.
     */
    public function syslogTargets(): SyslogTargetResource
    {
        return new SyslogTargetResource($this->connector);
    }
}
