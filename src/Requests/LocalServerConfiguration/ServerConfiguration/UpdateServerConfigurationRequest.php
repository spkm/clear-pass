<?php

namespace spkm\ClearPass\Requests\LocalServerConfiguration\ServerConfiguration;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\LocalServerConfiguration\ServerConfiguration;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update configuration of a server: PATCH /cluster/server/{uuid}.
 */
class UpdateServerConfigurationRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = ServerConfiguration::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $uuid, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/cluster/server/'.rawurlencode((string) $this->uuid);
    }
}
