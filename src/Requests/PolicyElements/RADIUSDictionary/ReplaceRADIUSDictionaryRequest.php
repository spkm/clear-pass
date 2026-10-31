<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSDictionary;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\RADIUSDictionary;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a RADIUS Dictionary: PUT /radius-dictionary/{radius_dictionary_id}.
 */
class ReplaceRADIUSDictionaryRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = RADIUSDictionary::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $radiusDictionaryId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/radius-dictionary/'.$this->radiusDictionaryId;
    }
}
