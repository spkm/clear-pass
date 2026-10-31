<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSProxyTarget;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\RADIUSProxyTarget;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a proxy target by name: PATCH /proxy-target/name/{name}.
 */
class UpdateRADIUSProxyTargetByNameRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = RADIUSProxyTarget::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/proxy-target/name/'.rawurlencode((string) $this->name);
    }
}
