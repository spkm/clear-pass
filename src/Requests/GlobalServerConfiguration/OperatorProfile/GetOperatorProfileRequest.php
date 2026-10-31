<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\OperatorProfile;

use spkm\ClearPass\Data\GlobalServerConfiguration\OperatorProfile;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get an operator profile: GET /operator-profile/{id}.
 */
class GetOperatorProfileRequest extends ItemRequest
{
    protected ?string $dto = OperatorProfile::class;

    public function __construct(protected int|string $id) {}

    public function resolveEndpoint(): string
    {
        return '/operator-profile/'.rawurlencode((string) $this->id);
    }
}
