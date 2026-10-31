<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\PolicerProfile;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\PolicerProfile;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a Policer Profile by name: PUT /enforcement-profile-dur/policer-profile/{product_name}/name/{name}.
 */
class ReplacePolicerProfileByNameRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = PolicerProfile::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected string $name, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/policer-profile/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
