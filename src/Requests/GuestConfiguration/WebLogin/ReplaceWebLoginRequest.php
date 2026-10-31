<?php

namespace spkm\ClearPass\Requests\GuestConfiguration\WebLogin;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GuestConfiguration\WebLogin;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a web login page: PUT /weblogin/{id}.
 */
class ReplaceWebLoginRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = WebLogin::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/weblogin/'.rawurlencode((string) $this->id);
    }
}
