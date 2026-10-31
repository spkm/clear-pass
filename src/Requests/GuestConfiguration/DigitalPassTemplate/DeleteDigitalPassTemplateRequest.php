<?php

namespace spkm\ClearPass\Requests\GuestConfiguration\DigitalPassTemplate;

use spkm\ClearPass\Requests\DeleteRequest;

/**
 * Delete a pass template: DELETE /template/pass/{id}.
 */
class DeleteDigitalPassTemplateRequest extends DeleteRequest
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
        return '/template/pass/'.rawurlencode((string) $this->id);
    }
}
