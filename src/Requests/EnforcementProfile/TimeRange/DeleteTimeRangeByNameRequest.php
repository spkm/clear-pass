<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\TimeRange;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a Time Range by name: DELETE /enforcement-profile-dur/time-range/{product_name}/name/{name}.
 */
class DeleteTimeRangeByNameRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $productName, protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/time-range/'.rawurlencode((string) $this->productName).'/name/'.rawurlencode((string) $this->name);
    }
}
