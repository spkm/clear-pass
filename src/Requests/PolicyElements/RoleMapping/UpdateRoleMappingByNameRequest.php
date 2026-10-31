<?php

namespace spkm\ClearPass\Requests\PolicyElements\RoleMapping;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\RoleMapping;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update a role mapping by name: PATCH /role-mapping/name/{name}.
 */
class UpdateRoleMappingByNameRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

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
