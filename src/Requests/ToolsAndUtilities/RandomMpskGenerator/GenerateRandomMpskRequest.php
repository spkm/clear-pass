<?php

namespace spkm\ClearPass\Requests\ToolsAndUtilities\RandomMpskGenerator;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\ToolsAndUtilities\RandomMpskGeneratorResponse;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * POST /random-mpsk: POST /random-mpsk.
 */
class GenerateRandomMpskRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = RandomMpskGeneratorResponse::class;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/random-mpsk';
    }
}
