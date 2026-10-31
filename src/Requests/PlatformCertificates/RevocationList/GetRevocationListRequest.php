<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\RevocationList;

use spkm\ClearPass\Data\PlatformCertificates\RevocationList;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a certificate by id: GET /revocation-list/{revocation_list_id}.
 */
class GetRevocationListRequest extends ItemRequest
{
    protected ?string $dto = RevocationList::class;

    public function __construct(protected int|string $revocationListId) {}

    public function resolveEndpoint(): string
    {
        return '/revocation-list/'.rawurlencode((string) $this->revocationListId);
    }
}
