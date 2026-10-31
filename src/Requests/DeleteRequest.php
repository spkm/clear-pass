<?php

namespace spkm\ClearPass\Requests;

use Saloon\Enums\Method;

/**
 * A DELETE of one record. ClearPass answers 204.
 */
abstract class DeleteRequest extends ClearPassRequest
{
    protected Method $method = Method::DELETE;

    protected string $responseShape = self::NONE;

    protected bool $safe = false;

    /** @var array<string, mixed> */
    protected array $options;

    /**
     * @param  array<string, mixed>  $options  Query options the operation documents, such as change_of_authorization.
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
