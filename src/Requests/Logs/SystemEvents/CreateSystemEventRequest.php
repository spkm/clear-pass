<?php

namespace spkm\ClearPass\Requests\Logs\SystemEvents;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Logs\SystemEvents;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new system event: POST /system-event.
 */
class CreateSystemEventRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = SystemEvents::class;

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
        return '/system-event';
    }
}
