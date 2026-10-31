<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\OperatorProfile;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an operator profile: DELETE /operator-profile/{id}.
 */
class DeleteOperatorProfileRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/operator-profile/'.rawurlencode((string) $this->id);
    }
}
