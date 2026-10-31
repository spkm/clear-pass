<?php

namespace spkm\ClearPass\Requests\PolicyElements\AuthSource;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\AuthSource;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace an authentication source by name: PUT /auth-source/name/{name}.
 */
class ReplaceAuthSourceByNameRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = AuthSource::class;

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
        return '/auth-source/name/'.rawurlencode((string) $this->name);
    }
}
