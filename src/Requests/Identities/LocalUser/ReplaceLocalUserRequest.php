<?php

namespace spkm\ClearPass\Requests\Identities\LocalUser;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Identities\LocalUser;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a local user: PUT /local-user/{local_user_id}.
 */
class ReplaceLocalUserRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = LocalUser::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $localUserId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/local-user/'.$this->localUserId;
    }
}
