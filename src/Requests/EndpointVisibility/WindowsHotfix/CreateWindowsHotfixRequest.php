<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\WindowsHotfix;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\WindowsHotfix;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Add a Windows Hotfix: POST /windows-hotfix.
 */
class CreateWindowsHotfixRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = WindowsHotfix::class;

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
        return '/windows-hotfix';
    }
}
