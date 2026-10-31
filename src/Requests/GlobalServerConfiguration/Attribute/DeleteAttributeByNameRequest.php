<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\Attribute;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an attribute by name: DELETE /attribute/{entity_name}/name/{name}.
 */
class DeleteAttributeByNameRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $entityName, protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/attribute/'.rawurlencode((string) $this->entityName).'/name/'.rawurlencode((string) $this->name);
    }
}
