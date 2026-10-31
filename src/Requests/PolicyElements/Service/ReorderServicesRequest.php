<?php

namespace spkm\ClearPass\Requests\PolicyElements\Service;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\ServiceReorder;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Reorder Services: PATCH /config/service/reorder.
 */
class ReorderServicesRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = ServiceReorder::class;

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
        return '/config/service/reorder';
    }
}
