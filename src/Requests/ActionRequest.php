<?php

namespace spkm\ClearPass\Requests;

/**
 * A PATCH or POST that does something to a record without sending one: enable, disable, run, start, stop and the
 * like. ClearPass answers with the record afterwards, or with nothing.
 */
abstract class ActionRequest extends ClearPassRequest
{
    protected string $responseShape = self::ONE;

    protected bool $safe = false;

    /** @var array<string, mixed> */
    protected array $options;

    /**
     * @param  array<string, mixed>  $options  Query options the operation documents.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return $this->options;
    }
}
