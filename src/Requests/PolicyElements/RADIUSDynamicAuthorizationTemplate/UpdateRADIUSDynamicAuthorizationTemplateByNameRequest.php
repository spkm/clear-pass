<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSDynamicAuthorizationTemplate;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\RADIUSDynamicAuthorizationTemplate;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update a RADIUS Dynamic Authorization Template by name: PATCH /radius-dynamic-authorization-template/name/{name}.
 */
class UpdateRADIUSDynamicAuthorizationTemplateByNameRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = RADIUSDynamicAuthorizationTemplate::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/radius-dynamic-authorization-template/name/'.rawurlencode((string) $this->name);
    }
}
