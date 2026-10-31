<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\MessagingSetup;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Reset Messaging setup configuration: DELETE /messaging-setup.
 */
class DeleteMessagingSetupRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/messaging-setup';
    }
}
