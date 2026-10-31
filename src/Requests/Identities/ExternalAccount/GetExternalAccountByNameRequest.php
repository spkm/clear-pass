<?php

namespace spkm\ClearPass\Requests\Identities\ExternalAccount;

use spkm\ClearPass\Data\Identities\ExternalAccount;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an external account by name: GET /external-account/name/{name}.
 */
class GetExternalAccountByNameRequest extends ItemRequest
{
    protected ?string $dto = ExternalAccount::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/external-account/name/'.rawurlencode((string) $this->name);
    }
}
