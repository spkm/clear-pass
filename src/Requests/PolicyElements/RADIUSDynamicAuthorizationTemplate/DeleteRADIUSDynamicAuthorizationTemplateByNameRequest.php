<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSDynamicAuthorizationTemplate;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a RADIUS Dynamic Authorization Template by name: DELETE /radius-dynamic-authorization-template/name/{name}.
 */
class DeleteRADIUSDynamicAuthorizationTemplateByNameRequest extends DeleteRequest
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
        return '/radius-dynamic-authorization-template/name/'.rawurlencode((string) $this->name);
    }
}
