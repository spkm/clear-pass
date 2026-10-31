<?php

namespace spkm\ClearPass\Resources\GlobalServerConfiguration;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\GlobalServerConfiguration\MessagingSetup;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\MessagingSetup\CreateMessagingSetupRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\MessagingSetup\DeleteMessagingSetupRequest;
use spkm\ClearPass\Requests\GlobalServerConfiguration\MessagingSetup\GetMessagingSetupRequest;
use spkm\ClearPass\Resources\SingletonResource;

/**
 * Operations for MessagingSetup, from ClearPass::globalServerConfiguration()->messagingSetup().
 *
 * @extends SingletonResource<MessagingSetup>
 */
class MessagingSetupResource extends SingletonResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, MessagingSetup::class);
    }

    protected function getRequest(array $options): ClearPassRequest
    {
        return new GetMessagingSetupRequest;
    }

    protected function createRequest(array $body, array $options): ClearPassRequest
    {
        return new CreateMessagingSetupRequest($body, $options);
    }

    protected function deleteRequest(array $options): ClearPassRequest
    {
        return new DeleteMessagingSetupRequest($options);
    }
}
