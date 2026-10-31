<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\FingerprintDictionary;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\FingerprintDictionary;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a Fingerprint by name: PATCH /fingerprint/name/{category}/{family}/{name}.
 */
class UpdateFingerprintDictionaryByNameRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = FingerprintDictionary::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $category, protected string $family, protected string $name, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/fingerprint/name/'.rawurlencode((string) $this->category).'/'.rawurlencode((string) $this->family).'/'.rawurlencode((string) $this->name);
    }
}
