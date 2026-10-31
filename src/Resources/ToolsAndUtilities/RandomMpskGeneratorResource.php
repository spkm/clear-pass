<?php

namespace spkm\ClearPass\Resources\ToolsAndUtilities;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Data\ToolsAndUtilities\RandomMpskGeneratorResponse;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Requests\ToolsAndUtilities\RandomMpskGenerator\GenerateRandomMpskRequest;
use spkm\ClearPass\Requests\ToolsAndUtilities\RandomMpskGenerator\GetRandomMpskRequest;
use spkm\ClearPass\Resources\SingletonResource;

/**
 * Generate a random MPSK, from ClearPass::toolsAndUtilities()->randomMpskGenerator().
 *
 * @extends SingletonResource<RandomMpskGeneratorResponse>
 */
class RandomMpskGeneratorResource extends SingletonResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, RandomMpskGeneratorResponse::class);
    }

    protected function getRequest(array $options): ClearPassRequest
    {
        return new GetRandomMpskRequest;
    }

    /**
     * POST /random-mpsk: POST /random-mpsk.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function generate(array|Data $attributes = [], array $options = []): ?RandomMpskGeneratorResponse
    {
        return $this->fetch(new GenerateRandomMpskRequest($this->payloadOf($attributes), $options));
    }
}
