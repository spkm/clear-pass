<?php

namespace spkm\ClearPass\Requests\ApiOperations\TokenEndpoint;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\ApiOperations\OAuth2Response;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Obtain an OAuth2 access token for making API calls: POST /oauth.
 */
class ObtainTokenRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = OAuth2Response::class;

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
        return '/oauth';
    }
}
