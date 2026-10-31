<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\WindowsHotfix;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\WindowsHotfix;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a windows hotfix: PATCH /windows-hotfix/{windows_hotfix_id}.
 */
class UpdateWindowsHotfixRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

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
