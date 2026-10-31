<?php

namespace spkm\ClearPass\Requests\Identities\ExternalAccount;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Identities\ExternalAccount;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace an external account by name: PUT /external-account/name/{name}.
 */
class ReplaceExternalAccountByNameRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = ExternalAccount::class;

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
        return '/external-account/name/'.rawurlencode((string) $this->name);
    }
}
