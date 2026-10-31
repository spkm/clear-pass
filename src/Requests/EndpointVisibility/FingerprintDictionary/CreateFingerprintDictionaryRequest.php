<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\FingerprintDictionary;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\FingerprintDictionary;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new Fingerprint: POST /fingerprint.
 */
class CreateFingerprintDictionaryRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = FingerprintDictionary::class;

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
        return '/fingerprint';
    }
}
