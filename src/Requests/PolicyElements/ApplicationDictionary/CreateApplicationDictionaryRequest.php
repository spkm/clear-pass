<?php

namespace spkm\ClearPass\Requests\PolicyElements\ApplicationDictionary;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\ApplicationDictionary;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new Application Dictionary: POST /application-dictionary.
 */
class CreateApplicationDictionaryRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = ApplicationDictionary::class;

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
        return '/application-dictionary';
    }
}
