<?php

namespace spkm\ClearPass\Requests\GuestConfiguration\GuestManager;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GuestConfiguration\GuestManager;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Modify settings at Configuration -> Guest Manager: POST /guestmanager.
 */
class CreateGuestManagerRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = GuestManager::class;

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
        return '/guestmanager';
    }
}
