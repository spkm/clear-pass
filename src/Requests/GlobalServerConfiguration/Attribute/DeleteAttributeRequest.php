<?php

namespace spkm\ClearPass\Requests\GlobalServerConfiguration\Attribute;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an attribute: DELETE /attribute/{attribute_id}.
 */
class DeleteAttributeRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $attributeId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/attribute/'.$this->attributeId;
    }
}
