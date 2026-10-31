<?php

namespace spkm\ClearPass\Requests\GuestConfiguration\WebLogin;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GuestConfiguration\WebLogin;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new web login page: POST /weblogin.
 */
class CreateWebLoginRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = WebLogin::class;

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
        return '/weblogin';
    }
}
