<?php

namespace spkm\ClearPass\Requests\Identities\GuestUser;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Identities\GuestUser;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new guest account: POST /guest.
 */
class CreateGuestUserRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = GuestUser::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options: change_of_authorization
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/guest';
    }
}
