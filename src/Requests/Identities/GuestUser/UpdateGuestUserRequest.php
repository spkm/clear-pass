<?php

namespace spkm\ClearPass\Requests\Identities\GuestUser;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Identities\GuestUser;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a guest account: PATCH /guest/{guest_id}.
 */
class UpdateGuestUserRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = GuestUser::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options: change_of_authorization
     */
    public function __construct(protected int $guestId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/guest/'.$this->guestId;
    }
}
