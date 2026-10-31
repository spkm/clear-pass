<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSProxyTarget;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\RADIUSProxyTarget;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a proxy target: PUT /proxy-target/{proxy_target_id}.
 */
class ReplaceRADIUSProxyTargetRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = RADIUSProxyTarget::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $proxyTargetId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/proxy-target/'.$this->proxyTargetId;
    }
}
