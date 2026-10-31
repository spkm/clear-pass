<?php

namespace spkm\ClearPass\Requests\GuestConfiguration\WebLogin;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\GuestConfiguration\WebLogin;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a web login page by page-name: PATCH /weblogin/page-name/{page-name}.
 */
class UpdateWebLoginByPageNameRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = WebLogin::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $pageName, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/weblogin/page-name/'.rawurlencode((string) $this->pageName);
    }
}
