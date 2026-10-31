<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\WindowsHotfix;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\WindowsHotfix;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace a windows hotfix: PUT /windows-hotfix/{windows_hotfix_id}.
 */
class ReplaceWindowsHotfixRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = WindowsHotfix::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $windowsHotfixId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/windows-hotfix/'.$this->windowsHotfixId;
    }
}
