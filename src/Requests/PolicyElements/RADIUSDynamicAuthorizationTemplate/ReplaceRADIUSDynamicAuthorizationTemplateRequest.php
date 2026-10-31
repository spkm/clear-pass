<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSDynamicAuthorizationTemplate;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\RADIUSDynamicAuthorizationTemplate;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a RADIUS Dynamic Authorization Template: PUT /radius-dynamic-authorization-template/{radius_dynamic_authorization_template_id}.
 */
class ReplaceRADIUSDynamicAuthorizationTemplateRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = RADIUSDynamicAuthorizationTemplate::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $radiusDynamicAuthorizationTemplateId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/radius-dynamic-authorization-template/'.$this->radiusDynamicAuthorizationTemplateId;
    }
}
