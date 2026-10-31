<?php

namespace spkm\ClearPass\Requests\PolicyElements\RoleMapping;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\RoleMapping;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new role mapping: POST /role-mapping.
 */
class CreateRoleMappingRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = RoleMapping::class;

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
        return '/role-mapping';
    }
}
