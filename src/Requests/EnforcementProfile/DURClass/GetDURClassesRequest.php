<?php

namespace spkm\ClearPass\Requests\EnforcementProfile\DURClass;

use spkm\ClearPass\Data\EnforcementProfile\DURClass;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Requests\ListRequest;

/**
 * GET a list of Policies: GET /enforcement-profile-dur/dur-class/{product_name}.
 */
class GetDURClassesRequest extends ListRequest
{
    protected ?string $dto = DURClass::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $productName, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/enforcement-profile-dur/dur-class/'.rawurlencode((string) $this->productName);
    }
}
