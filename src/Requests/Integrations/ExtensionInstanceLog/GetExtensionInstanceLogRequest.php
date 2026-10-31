<?php

namespace spkm\ClearPass\Requests\Integrations\ExtensionInstanceLog;

use spkm\ClearPass\Data\Integrations\ExtensionInstanceLog;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get the log output from an installed extension: GET /extension/instance/{id}/log.
 */
class GetExtensionInstanceLogRequest extends ItemRequest
{
    protected ?string $dto = ExtensionInstanceLog::class;

    /**
     * @param  array<string, mixed>  $options  Query options: stdout, stderr, since, timestamps, tail
     */
    public function __construct(protected int|string $id, protected array $options = []) {}

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return $this->options;
    }

    public function resolveEndpoint(): string
    {
        return '/extension/instance/'.rawurlencode((string) $this->id).'/log';
    }
}
