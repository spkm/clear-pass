<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\ClearPassPortal;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GlobalServerConfiguration\ClearPassPortal;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Change ClearPass Portal: POST /clearpass-portal.
 */
class CreateClearPassPortalRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = ClearPassPortal::class;

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
        return '/clearpass-portal';
    }
}
