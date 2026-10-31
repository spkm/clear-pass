<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\RevocationList;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a certificate list by id: DELETE /revocation-list/{revocation_list_id}.
 */
class DeleteRevocationListRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $revocationListId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/revocation-list/'.rawurlencode((string) $this->revocationListId);
    }
}
