<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSDynamicAuthorizationTemplate;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a RADIUS Dynamic Authorization Template: DELETE /radius-dynamic-authorization-template/{radius_dynamic_authorization_template_id}.
 */
class DeleteRADIUSDynamicAuthorizationTemplateRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $radiusDynamicAuthorizationTemplateId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/radius-dynamic-authorization-template/'.$this->radiusDynamicAuthorizationTemplateId;
    }
}
