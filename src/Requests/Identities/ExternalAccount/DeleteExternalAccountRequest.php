<?php

namespace spkm\ClearPass\Requests\Identities\ExternalAccount;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an external account: DELETE /external-account/{external_account_id}.
 */
class DeleteExternalAccountRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $externalAccountId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/external-account/'.$this->externalAccountId;
    }
}
