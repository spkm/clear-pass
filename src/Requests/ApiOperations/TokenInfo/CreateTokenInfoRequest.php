<?php

namespace spkm\ClearPass\Requests\ApiOperations\TokenInfo;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\ApiOperations\TokenInfo;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Returns OAuth2 authenticated client or user information: POST /oauth/me.
 */
class CreateTokenInfoRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = TokenInfo::class;

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
        return '/oauth/me';
    }
}
