<?php

namespace spkm\ClearPass\Requests\GuestConfiguration\PrintTemplate;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a print template: DELETE /template/print/{id}.
 */
class DeletePrintTemplateRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/template/print/'.rawurlencode((string) $this->id);
    }
}
