<?php

namespace spkm\ClearPass\Requests\PolicyElements\TACACSServiceDictionary;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a TACACS+ Service Dictionary by name: DELETE /tacacs-service-dictionary/name/{name}.
 */
class DeleteTACACSServiceDictionaryByNameRequest extends DeleteRequest
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
        return '/tacacs-service-dictionary/name/'.rawurlencode((string) $this->name);
    }
}
