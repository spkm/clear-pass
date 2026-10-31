<?php

namespace spkm\ClearPass\Requests\SessionControl\ActiveSessionReauthorize;

use spkm\ClearPass\Data\SessionControl\ReauthorizationProfiles;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Get reauthorization profile(s) for an active session: GET /session/{id}/reauthorize.
 */
class GetActiveSessionReauthorizeRequest extends ItemRequest
{
    protected ?string $dto = ReauthorizationProfiles::class;

    /**
     * @param  array<string, mixed>  $options  Query options: template_type
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
        return '/session/'.rawurlencode((string) $this->id).'/reauthorize';
    }
}
