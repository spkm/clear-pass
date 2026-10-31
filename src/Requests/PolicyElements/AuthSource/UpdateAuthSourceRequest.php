<?php

namespace spkm\ClearPass\Requests\PolicyElements\AuthSource;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\AuthSource;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of an authentication source: PATCH /auth-source/{auth_source_id}.
 */
class UpdateAuthSourceRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = AuthSource::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $authSourceId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/auth-source/'.$this->authSourceId;
    }
}
