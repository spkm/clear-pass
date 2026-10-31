<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSProxyTarget;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\RADIUSProxyTarget;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a proxy target: PATCH /proxy-target/{proxy_target_id}.
 */
class UpdateRADIUSProxyTargetRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

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
