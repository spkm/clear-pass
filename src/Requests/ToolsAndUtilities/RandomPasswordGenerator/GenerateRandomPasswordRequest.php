<?php

namespace spkm\ClearPass\Requests\ToolsAndUtilities\RandomPasswordGenerator;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ClearPass\Data\ToolsAndUtilities\RandomPasswordGeneratorResponse;
use spkm\ClearPass\Requests\WriteRequest;

/**
 * POST /random-password: POST /random-password.
 */
class GenerateRandomPasswordRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    protected ?string $dto = RandomPasswordGeneratorResponse::class;

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
        return '/random-password';
    }
}
