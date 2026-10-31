<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSDynamicAuthorizationTemplate;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\RADIUSDynamicAuthorizationTemplate;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Create a new RADIUS Dynamic Authorization Template: POST /radius-dynamic-authorization-template.
 */
class CreateRADIUSDynamicAuthorizationTemplateRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = RADIUSDynamicAuthorizationTemplate::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/radius-dynamic-authorization-template';
    }
}
