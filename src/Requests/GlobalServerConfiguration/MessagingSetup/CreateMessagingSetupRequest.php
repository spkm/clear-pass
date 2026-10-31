<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\MessagingSetup;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\MessagingSetup;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Configure Messaging setup: POST /messaging-setup.
 */
class CreateMessagingSetupRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = MessagingSetup::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/messaging-setup';
    }
}
