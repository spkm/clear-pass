<?php

namespace spkm\ClearPass\Requests\PlatformCertificates\RevocationList;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PlatformCertificates\RevocationList;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Add a new revocation certificate list: POST /revocation-list.
 */
class CreateRevocationListRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = RevocationList::class;

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
        return '/revocation-list';
    }
}
