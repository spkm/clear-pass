<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSDynamicAuthorizationTemplate;

use spkm\ClearPass\Data\PolicyElements\RADIUSDynamicAuthorizationTemplate;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get a RADIUS Dynamic Authorization Template: GET /radius-dynamic-authorization-template/{radius_dynamic_authorization_template_id}.
 */
class GetRADIUSDynamicAuthorizationTemplateRequest extends ItemRequest
{
    protected ?string $dto = RADIUSDynamicAuthorizationTemplate::class;

    public function __construct(protected int $radiusDynamicAuthorizationTemplateId) {}

    public function resolveEndpoint(): string
    {
        return '/radius-dynamic-authorization-template/'.$this->radiusDynamicAuthorizationTemplateId;
    }
}
