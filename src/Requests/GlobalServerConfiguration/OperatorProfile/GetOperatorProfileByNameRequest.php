<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\OperatorProfile;

use spkm\ClearPass\Data\GlobalServerConfiguration\OperatorProfile;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an operator profile by name: GET /operator-profile/name/{name}.
 */
class GetOperatorProfileByNameRequest extends ItemRequest
{
    protected ?string $dto = OperatorProfile::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/operator-profile/name/'.rawurlencode((string) $this->name);
    }
}
