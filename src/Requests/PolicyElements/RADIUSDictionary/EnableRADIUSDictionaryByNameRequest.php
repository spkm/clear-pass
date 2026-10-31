<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSDictionary;

use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\RADIUSDictionary;
use spkm\ClearPass\Requests\ActionRequest;

/**
 * Enable a RADIUS Dictionary by name: PATCH /radius-dictionary/name/{name}/enable.
 */
class EnableRADIUSDictionaryByNameRequest extends ActionRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = RADIUSDictionary::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/radius-dictionary/name/'.rawurlencode((string) $this->name).'/enable';
    }
}
