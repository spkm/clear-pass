<?php

namespace spkm\ClearPass;

use BadMethodCallException;
use InvalidArgumentException;

/**
 * What the ClearPass facade resolves: the default connector, built from config('clearpass') the first time it is
 * needed, and any named connections.
 *
 * @mixin ClearPassConnector
 */
class ClearPassService
{
    protected ClearPassConnector $connector;

    /** @var array<string, ClearPassConnector> */
    protected array $connections = [];

    /**
     * The connector for another server, configured under clearpass.connections.{name}.
     */
    public function connection(string $name): ClearPassConnector
    {
        $config = config("clearpass.connections.$name");

        if (! is_array($config)) {
            throw new InvalidArgumentException('No ClearPass connection named "'.$name.'" is configured in clearpass.connections.');
        }

        return $this->connections[$name] ??= $this->connect($config, 'The ClearPass connection "'.$name.'"');
    }

    /**
     * @param  array<mixed>  $parameters
     */
    public function __call(string $method, array $parameters): mixed
    {
        $this->connector ??= $this->connect((array) config('clearpass'), 'The default ClearPass connection');

        if (method_exists($this->connector, $method)) {
            return $this->connector->{$method}(...$parameters);
        }

        throw new BadMethodCallException("Method {$method} does not exist.");
    }

    /**
     * @param  array<string, mixed>  $config
     */
    private function connect(array $config, string $connection): ClearPassConnector
    {
        foreach (['base_url', 'client_id', 'client_secret'] as $setting) {
            if (! is_string($config[$setting] ?? null) || $config[$setting] === '') {
                throw new InvalidArgumentException("$connection needs a $setting.");
            }
        }

        return new ClearPassConnector($config['client_id'], $config['client_secret'], $config['base_url']);
    }
}
