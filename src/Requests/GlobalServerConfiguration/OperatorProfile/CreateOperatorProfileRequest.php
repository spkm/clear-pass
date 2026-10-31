<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\OperatorProfile;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\OperatorProfile;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new operator profile: POST /operator-profile.
 */
class CreateOperatorProfileRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = OperatorProfile::class;

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
        return '/operator-profile';
    }
}
