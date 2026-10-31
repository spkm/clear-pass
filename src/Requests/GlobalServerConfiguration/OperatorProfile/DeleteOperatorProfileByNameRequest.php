<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\OperatorProfile;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an operator profile by name: DELETE /operator-profile/name/{name}.
 */
class DeleteOperatorProfileByNameRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/operator-profile/name/'.rawurlencode((string) $this->name);
    }
}
