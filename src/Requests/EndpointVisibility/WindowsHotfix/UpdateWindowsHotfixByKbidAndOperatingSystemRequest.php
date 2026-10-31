<?php

namespace spkm\ClearPass\Requests\EndpointVisibility\WindowsHotfix;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\EndpointVisibility\WindowsHotfix;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Update some fields of a windows hotfix by kbid and os: PATCH /windows-hotfix/kbid/{kbid}/operating_system/{operating_system}.
 */
class UpdateWindowsHotfixByKbidAndOperatingSystemRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = WindowsHotfix::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $kbid, protected string $operatingSystem, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/windows-hotfix/kbid/'.rawurlencode((string) $this->kbid).'/operating_system/'.rawurlencode((string) $this->operatingSystem);
    }
}
