<?php

namespace spkm\ClearPass\Requests\Identities\ExternalAccount;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Identities\ExternalAccount;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Add an external account: POST /external-account.
 */
class CreateExternalAccountRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = ExternalAccount::class;

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
        return '/external-account';
    }
}
