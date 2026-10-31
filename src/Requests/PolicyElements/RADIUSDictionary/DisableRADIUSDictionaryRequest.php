<?php

namespace spkm\ClearPass\Requests\PolicyElements\RADIUSDictionary;

use Saloon\Enums\Method;
use spkm\ClearPass\Data\PolicyElements\RADIUSDictionary;
use spkm\ClearPass\Requests\ActionRequest;

/**
 * Disable a RADIUS Dictionary: PATCH /radius-dictionary/{radius_dictionary_id}/disable.
 */
class DisableRADIUSDictionaryRequest extends ActionRequest
{
    protected Method $method = Method::PATCH;

    protected ?string $dto = RADIUSDictionary::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $radiusDictionaryId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/radius-dictionary/'.$this->radiusDictionaryId.'/disable';
    }
}
