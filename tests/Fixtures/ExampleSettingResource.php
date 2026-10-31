<?php

namespace spkm\ClearPass\Tests\Fixtures;

use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Resources\SingletonResource;

/**
 * @extends SingletonResource<ExampleData>
 */
class ExampleSettingResource extends SingletonResource
{
    public function __construct(ClearPassConnector $connector)
    {
        parent::__construct($connector, ExampleData::class);
    }

    protected function getRequest(array $options): ClearPassRequest
    {
        return new ExampleSettingRequest;
    }

    protected function updateRequest(array $body, array $options): ClearPassRequest
    {
        return new ExampleSettingUpdateRequest($body, $options);
    }
}
