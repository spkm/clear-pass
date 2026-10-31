<?php

namespace spkm\ClearPass\Requests\PolicyElements\ApplicationDictionary;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\ApplicationDictionary;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update an Application Dictionary: PATCH /application-dictionary/{application_dictionary_id}.
 */
class UpdateApplicationDictionaryRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = ApplicationDictionary::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $applicationDictionaryId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/application-dictionary/'.$this->applicationDictionaryId;
    }
}
