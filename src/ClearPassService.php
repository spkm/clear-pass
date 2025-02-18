<?php

namespace spkm\ClearPass;

use Saloon\Http\Request;

class ClearPassService
{
    protected ClearPassConnector $connector;

    public function __construct()
    {
        $this->connector = new ClearPassConnector(
            config('clearpass.client_id'),
            config('clearpass.client_secret'),
            config('clearpass.base_url')
        );
    }

    public function __call($method, $parameters)
    {
        if (method_exists($this->connector, $method)) {
            return call_user_func_array([$this->connector, $method], $parameters);
        }

        throw new \BadMethodCallException("Method {$method} does not exist.");
    }
}

