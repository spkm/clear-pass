<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSDictionary;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\RADIUSDictionary;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update a RADIUS Dictionary by name: PATCH /radius-dictionary/name/{name}.
 */
class UpdateRADIUSDictionaryByNameRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = RADIUSDictionary::class;

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
        return '/radius-dictionary/name/'.rawurlencode((string) $this->name);
    }
}
