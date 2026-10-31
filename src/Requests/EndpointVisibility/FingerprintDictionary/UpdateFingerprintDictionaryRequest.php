<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\FingerprintDictionary;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\FingerprintDictionary;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a Fingerprint: PATCH /fingerprint/{fingerprint_id}.
 */
class UpdateFingerprintDictionaryRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = FingerprintDictionary::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $fingerprintId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/fingerprint/'.$this->fingerprintId;
    }
}
