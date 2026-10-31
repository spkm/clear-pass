<?php

namespace spkm\ClearPass\Requests\Integrations\EventSources;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete an event source by name: DELETE /event-sources/name/{name}.
 */
class DeleteEventSourceByNameRequest extends DeleteRequest
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
        return '/event-sources/name/'.rawurlencode((string) $this->name);
    }
}
