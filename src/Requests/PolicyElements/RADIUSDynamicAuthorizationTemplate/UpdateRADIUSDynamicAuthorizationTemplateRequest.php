<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSDynamicAuthorizationTemplate;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\RADIUSDynamicAuthorizationTemplate;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update a RADIUS Dynamic Authorization Template: PATCH /radius-dynamic-authorization-template/{radius_dynamic_authorization_template_id}.
 */
class UpdateRADIUSDynamicAuthorizationTemplateRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

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
