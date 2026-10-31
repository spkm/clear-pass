<?php

namespace spkm\ClearPass\Requests\LocalServerConfiguration\AccessControl;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\LocalServerConfiguration\AccessControl;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace an application access controls by resource name: PUT /server/access-control/{server_uuid}/{resource_name}.
 */
class ReplaceAccessControlByResourceNameRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = AccessControl::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serverUuid, protected string $resourceName, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/server/access-control/'.rawurlencode((string) $this->serverUuid).'/'.rawurlencode((string) $this->resourceName);
    }
}
