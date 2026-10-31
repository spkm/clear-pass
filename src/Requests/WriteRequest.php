<?php

namespace spkm\ClearPass\Requests;

use JsonSerializable;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

/**
 * A POST, PATCH or PUT carrying a record as JSON: an array of ClearPass's field names, or a model. ClearPass
 * answers with the record as stored, or with nothing (204, or 304 when nothing changed).
 */
abstract class WriteRequest extends ClearPassRequest implements HasBody
{
    use HasJsonBody;

    protected string $responseShape = self::ONE;

    protected bool $safe = false;

    /** @var array<string, mixed>|JsonSerializable */
    protected array|JsonSerializable $record;

    /** @var array<string, mixed> */
    protected array $options;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options the operation documents, such as change_of_authorization.
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultBody(): array
    {
        return $this->record instanceof JsonSerializable ? (array) $this->record->jsonSerialize() : $this->record;
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return $this->options;
    }
}
