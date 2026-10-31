<?php

namespace spkm\ClearPass\Requests\Identities\ExternalAccount;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Identities\ExternalAccount;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of an external account: PATCH /external-account/{external_account_id}.
 */
class UpdateExternalAccountRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = ExternalAccount::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $externalAccountId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/external-account/'.$this->externalAccountId;
    }
}
