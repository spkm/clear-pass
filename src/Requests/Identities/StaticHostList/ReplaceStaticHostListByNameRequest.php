<?php

namespace spkm\ClearPass\Requests\Identities\StaticHostList;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Identities\StaticHostList;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a static host list by name: PUT /static-host-list/name/{name}.
 */
class ReplaceStaticHostListByNameRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = StaticHostList::class;

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
        return '/static-host-list/name/'.rawurlencode((string) $this->name);
    }
}
