<?php

namespace spkm\ClearPass\Requests\Identities\LocalUser;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Identities\LocalUser;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new local user: POST /local-user.
 */
class CreateLocalUserRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = LocalUser::class;

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
        return '/local-user';
    }
}
