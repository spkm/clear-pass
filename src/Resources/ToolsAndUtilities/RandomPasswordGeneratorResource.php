<?php

namespace spkm\ClearPass\Resources\ToolsAndUtilities;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\ToolsAndUtilities\RandomPasswordGeneratorResponse;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ToolsAndUtilities\RandomPasswordGenerator\GenerateRandomPasswordRequest;
use spkm\ClearPass\Requests\ToolsAndUtilities\RandomPasswordGenerator\GetRandomPasswordRequest;
use spkm\ClearPass\Resources\SingletonResource;

/**
 * Generate a random password, from ClearPass::toolsAndUtilities()->randomPasswordGenerator().
 *
 * @extends SingletonResource<RandomPasswordGeneratorResponse>
 */
class RandomPasswordGeneratorResource extends SingletonResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, RandomPasswordGeneratorResponse::class);
    }

    protected function getRequest(array $options): ClearPassRequest
    {
        return new GetRandomPasswordRequest;
    }

    /**
     * POST /random-password: POST /random-password.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function generate(array|Data $attributes = [], array $options = []): ?RandomPasswordGeneratorResponse
    {
        return $this->fetch(new GenerateRandomPasswordRequest($this->payloadOf($attributes), $options));
    }
}
