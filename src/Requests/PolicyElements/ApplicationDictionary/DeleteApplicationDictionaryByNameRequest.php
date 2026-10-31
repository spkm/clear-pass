<?php

namespace spkm\ClearPass\Requests\PolicyElements\ApplicationDictionary;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an Application Dictionary by name: DELETE /application-dictionary/name/{name}.
 */
class DeleteApplicationDictionaryByNameRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/application-dictionary/name/'.rawurlencode((string) $this->name);
    }
}
