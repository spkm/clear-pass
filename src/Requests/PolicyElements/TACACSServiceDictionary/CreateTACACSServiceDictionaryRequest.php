<?php

namespace spkm\ClearPass\Requests\PolicyElements\TACACSServiceDictionary;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\TACACSServiceDictionary;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new TACACS+ Service Dictionary: POST /tacacs-service-dictionary.
 */
class CreateTACACSServiceDictionaryRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = TACACSServiceDictionary::class;

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
        return '/tacacs-service-dictionary';
    }
}
