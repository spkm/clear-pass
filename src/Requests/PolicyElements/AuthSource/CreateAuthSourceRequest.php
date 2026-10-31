<?php

namespace spkm\ClearPass\Requests\PolicyElements\AuthSource;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\AuthSource;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new authentication source: POST /auth-source.
 */
class CreateAuthSourceRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = AuthSource::class;

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
        return '/auth-source';
    }
}
