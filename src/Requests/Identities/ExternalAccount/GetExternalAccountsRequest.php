<?php

namespace spkm\ClearPass\Requests\Identities\ExternalAccount;

use spkm\ClearPass\Data\Identities\ExternalAccount;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * Get a list of external accounts: GET /external-account.
 */
class GetExternalAccountsRequest extends ListRequest
{
    protected ?string $dto = ExternalAccount::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/external-account';
    }
}
