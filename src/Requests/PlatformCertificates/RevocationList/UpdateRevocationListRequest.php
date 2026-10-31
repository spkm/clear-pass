<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\RevocationList;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PlatformCertificates\RevocationList;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update a certificate: PATCH /revocation-list/{revocation_list_id}.
 */
class UpdateRevocationListRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = RevocationList::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $revocationListId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/revocation-list/'.rawurlencode((string) $this->revocationListId);
    }
}
