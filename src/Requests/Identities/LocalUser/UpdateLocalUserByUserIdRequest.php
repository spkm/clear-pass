<?php

namespace spkm\ClearPass\Requests\Identities\LocalUser;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Identities\LocalUser;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a local user by user_id: PATCH /local-user/user-id/{user_id}.
 */
class UpdateLocalUserByUserIdRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = LocalUser::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $userId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/local-user/user-id/'.rawurlencode((string) $this->userId);
    }
}
