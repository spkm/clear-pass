<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\Attribute;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\Attribute;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace an attribute by name: PUT /attribute/{entity_name}/name/{name}.
 */
class ReplaceAttributeByNameRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = Attribute::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $entityName, protected string $name, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/attribute/'.rawurlencode((string) $this->entityName).'/name/'.rawurlencode((string) $this->name);
    }
}
