<?php

namespace spkm\ClearPass\Requests\PolicyElements\TACACSServiceDictionary;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\TACACSServiceDictionary;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a TACACS+ Service Dictionary: PUT /tacacs-service-dictionary/{tacacs_service_dictionary_id}.
 */
class ReplaceTACACSServiceDictionaryRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = TACACSServiceDictionary::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $tacacsServiceDictionaryId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/tacacs-service-dictionary/'.$this->tacacsServiceDictionaryId;
    }
}
