<?php

namespace spkm\ClearPass\Requests\Integrations\IngressEventDictionary;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\Integrations\IngressEventDictionary;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * Replace an Ingress Event Dictionary by format_name: PUT /ingress-event-dictionary/format_name/{format_name}.
 */
class ReplaceIngressEventDictionaryByFormatNameRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected ?string $dto = IngressEventDictionary::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $formatName, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/ingress-event-dictionary/format_name/'.rawurlencode((string) $this->formatName);
    }
}
