<?php

namespace spkm\ClearPass\Requests\PolicyElements\ApplicationDictionary;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\ApplicationDictionary;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update an Application Dictionary by name: PATCH /application-dictionary/name/{name}.
 */
class UpdateApplicationDictionaryByNameRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = ApplicationDictionary::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/application-dictionary/name/'.rawurlencode((string) $this->name);
    }
}
