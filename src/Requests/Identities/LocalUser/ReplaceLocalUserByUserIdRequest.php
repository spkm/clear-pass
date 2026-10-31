<?php

namespace spkm\ClearPass\Requests\Identities\LocalUser;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Identities\LocalUser;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a local user by user_id: PUT /local-user/user-id/{user_id}.
 */
class ReplaceLocalUserByUserIdRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

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
