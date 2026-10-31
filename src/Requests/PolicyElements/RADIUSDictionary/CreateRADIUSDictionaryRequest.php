<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSDictionary;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\RADIUSDictionary;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new RADIUS Dictionary: POST /radius-dictionary.
 */
class CreateRADIUSDictionaryRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = RADIUSDictionary::class;

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
        return '/radius-dictionary';
    }
}
