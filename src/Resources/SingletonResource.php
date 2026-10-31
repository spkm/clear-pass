<?php

namespace spkm\ClearPass\Resources;

use LogicException;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Requests\ClearPassRequest;

/**
 * A setting ClearPass keeps one of, such as the guest manager configuration: read it, change some fields, replace
 * it, or (where ClearPass allows) create or delete it.
 *
 * @template TData of Data
 *
 * @extends BaseResource<TData>
 */
abstract class SingletonResource extends BaseResource
{
    /**
     * @param  array<string, mixed>  $options
     */
    abstract protected function getRequest(array $options): ClearPassRequest;

    /**
     * @param  array<string, mixed>  $body
     * @param  array<string, mixed>  $options
     */
    protected function createRequest(array $body, array $options): ?ClearPassRequest
    {
        return null;
    }

    /**
     * @param  array<string, mixed>  $body
     * @param  array<string, mixed>  $options
     */
    protected function updateRequest(array $body, array $options): ?ClearPassRequest
    {
        return null;
    }

    /**
     * @param  array<string, mixed>  $body
     * @param  array<string, mixed>  $options
     */
    protected function replaceRequest(array $body, array $options): ?ClearPassRequest
    {
        return null;
    }

    /**
     * @param  array<string, mixed>  $options
     */
    protected function deleteRequest(array $options): ?ClearPassRequest
    {
        return null;
    }

    /**
     * The setting as it is.
     *
     * @param  array<string, mixed>  $options  Query options the operation documents.
     * @return TData|null
     */
    public function get(array $options = []): mixed
    {
        return $this->fetch($this->getRequest($options));
    }

    /**
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     * @return TData|null
     */
    public function create(array|Data $attributes, array $options = []): mixed
    {
        return $this->fetch($this->createRequest($this->payloadOf($attributes), $options) ?? $this->undocumented('create'));
    }

    /**
     * Change some fields of the setting.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     * @return TData|null
     */
    public function update(array|Data $attributes, array $options = []): mixed
    {
        return $this->fetch($this->updateRequest($this->payloadOf($attributes), $options) ?? $this->undocumented('update'));
    }

    /**
     * Replace the whole setting.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     * @return TData|null
     */
    public function replace(array|Data $attributes, array $options = []): mixed
    {
        return $this->fetch($this->replaceRequest($this->payloadOf($attributes), $options) ?? $this->undocumented('replace'));
    }

    /**
     * @param  array<string, mixed>  $options
     */
    public function delete(array $options = []): bool
    {
        $this->fetch($this->deleteRequest($options) ?? $this->undocumented('delete'));

        return true;
    }

    private function undocumented(string $action): never
    {
        throw new LogicException("ClearPass's API documents no way to $action this setting.");
    }
}
