<?php

namespace spkm\ClearPass\Requests\Identities\ExternalAccount;

use spkm\ClearPass\Data\Identities\ExternalAccount;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an external account: GET /external-account/{external_account_id}.
 */
class GetExternalAccountRequest extends ItemRequest
{
    protected ?string $dto = ExternalAccount::class;

    public function __construct(protected int $externalAccountId) {}

    public function resolveEndpoint(): string
    {
        return '/external-account/'.$this->externalAccountId;
    }
}
