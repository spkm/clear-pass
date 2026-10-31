<?php

namespace spkm\ClearPass\Requests\PolicyElements\RoleMapping;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\RoleMapping;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a role mapping by name: PUT /role-mapping/name/{name}.
 */
class ReplaceRoleMappingByNameRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = RoleMapping::class;

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
        return '/role-mapping/name/'.rawurlencode((string) $this->name);
    }
}
