<?php

namespace spkm\ClearPass\Requests\PolicyElements\RoleMapping;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\RoleMapping;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update a role mapping: PATCH /role-mapping/{role_mapping_id}.
 */
class UpdateRoleMappingRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = RoleMapping::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $roleMappingId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/role-mapping/'.$this->roleMappingId;
    }
}
