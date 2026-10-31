<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\ListAllPrivileges;

use spkm\ClearPass\Data\GlobalServerConfiguration\ListAllPrivileges;
use spkm\ClearPass\Requests\ItemRequest;

/**
 * Returns the list of system-defined privileges: GET /oauth/all-privileges.
 */
class ListAllPrivilegesRequest extends ItemRequest
{
    protected ?string $dto = ListAllPrivileges::class;

    /**
     * @param  array<string, mixed>  $options  Query options: format
     */
    public function __construct(protected array $options = []) {}

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return $this->options;
    }

    public function resolveEndpoint(): string
    {
        return '/oauth/all-privileges';
    }
}
