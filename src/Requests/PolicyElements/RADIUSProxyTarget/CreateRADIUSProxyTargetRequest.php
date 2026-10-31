<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSProxyTarget;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\RADIUSProxyTarget;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new proxy target: POST /proxy-target.
 */
class CreateRADIUSProxyTargetRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = RADIUSProxyTarget::class;

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
        return '/proxy-target';
    }
}
