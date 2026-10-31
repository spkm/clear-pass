<?php

namespace spkm\ClearPass\Requests\Identities\GuestUser;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Identities\GuestUser;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a guest account by username: PUT /guest/username/{username}.
 */
class ReplaceGuestUserByUsernameRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = GuestUser::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options: change_of_authorization
     */
    public function __construct(protected string $username, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/guest/username/'.rawurlencode((string) $this->username);
    }
}
