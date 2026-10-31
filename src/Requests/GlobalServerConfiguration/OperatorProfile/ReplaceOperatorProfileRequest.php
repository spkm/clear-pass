<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\OperatorProfile;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\OperatorProfile;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace an operator profile: PUT /operator-profile/{id}.
 */
class ReplaceOperatorProfileRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = OperatorProfile::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/operator-profile/'.rawurlencode((string) $this->id);
    }
}
