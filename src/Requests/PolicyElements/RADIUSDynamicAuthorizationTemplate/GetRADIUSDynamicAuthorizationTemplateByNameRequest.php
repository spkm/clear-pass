<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSDynamicAuthorizationTemplate;

use spkm\ClearPass\Data\PolicyElements\RADIUSDynamicAuthorizationTemplate;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a RADIUS Dynamic Authorization Template by name: GET /radius-dynamic-authorization-template/name/{name}.
 */
class GetRADIUSDynamicAuthorizationTemplateByNameRequest extends ItemRequest
{
    protected ?string $dto = RADIUSDynamicAuthorizationTemplate::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/radius-dynamic-authorization-template/name/'.rawurlencode((string) $this->name);
    }
}
