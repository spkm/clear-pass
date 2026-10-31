<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\OperatorProfile;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\OperatorProfile;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update an operator profile by name: PATCH /operator-profile/name/{name}.
 */
class UpdateOperatorProfileByNameRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = OperatorProfile::class;

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
        return '/operator-profile/name/'.rawurlencode((string) $this->name);
    }
}
