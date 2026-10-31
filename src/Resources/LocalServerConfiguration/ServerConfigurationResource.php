<?php

namespace spkm\ClearPass\Resources\LocalServerConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\LocalServerConfiguration\ServerConfiguration;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ListRequest;
use spkm\ClearPass\Requests\LocalServerConfiguration\ServerConfiguration\GetServerConfigurationRequest;
use spkm\ClearPass\Requests\LocalServerConfiguration\ServerConfiguration\GetServerConfigurationsRequest;
use spkm\ClearPass\Requests\LocalServerConfiguration\ServerConfiguration\UpdateServerConfigurationRequest;

/**
 * Manage cluster servers and per-server configuration, from ClearPass::localServerConfiguration()->serverConfigurations().
 *
 * @extends Builder<ServerConfiguration>
 */
class ServerConfigurationResource extends Builder
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, ServerConfiguration::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetServerConfigurationsRequest($query);
    }

    protected function itemRequest(int|string $id): ClearPassRequest
    {
        return new GetServerConfigurationRequest((string) $id);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ClearPassRequest
    {
        return new UpdateServerConfigurationRequest((string) $id, $body, $options);
    }
}
