<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\OnGuardActivity;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\OnGuardActivityResponse;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Send/Broadcast Message: POST /onguard-activity/message.
 */
class CreateOnGuardActivityMessageRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = OnGuardActivityResponse::class;

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
        return '/onguard-activity/message';
    }
}
