<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\MessagingSetup;

use spkm\ClearPass\Data\GlobalServerConfiguration\MessagingSetup;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * GET Messaging setup: GET /messaging-setup.
 */
class GetMessagingSetupRequest extends ItemRequest
{
    protected ?string $dto = MessagingSetup::class;

    public function resolveEndpoint(): string
    {
        return '/messaging-setup';
    }
}
