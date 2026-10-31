<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\VoIPProfile;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EnforcementProfile\VoIPProfile;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a VoIP Profile by name: PUT /enforcement-profile-dur/voip-profile/{product_name}/name/{name}.
 */
class ReplaceVoIPProfileByNameRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = VoIPProfile::class;

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
        return '/enforcement-profile-dur/voip-profile/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
