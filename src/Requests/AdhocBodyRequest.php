<?php

namespace spkm\ClearPass\Requests;

use JsonSerializable;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * An ad-hoc POST, PUT or PATCH carrying a record as JSON: an array of ClearPass's field names, or a model.
 */
class AdhocBodyRequest extends AdhocRequest implements HasBody
{
    use HasJsonBody;

    /** @var array<mixed>|JsonSerializable */
    protected array|JsonSerializable $payload;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $parameters
     */
    public function __construct(Method $method, string $path, array|JsonSerializable $body = [], array $parameters = [], string $shape = self::RAW)
    {
        parent::__construct($method, $path, $parameters, $shape);

        $this->payload = $body;
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->payload instanceof JsonSerializable ? (array) $this->payload->jsonSerialize() : $this->payload;
    }
}
