<?php

namespace spkm\ClearPass\Requests\Integrations\DeviceInsight;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Integrations\DeviceInsight;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update Device Insight Integration values: POST /device-insight.
 */
class CreateDeviceInsightRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = DeviceInsight::class;

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
        return '/device-insight';
    }
}
