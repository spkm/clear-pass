<?php

use spkm\ClearPass\Facades\ClearPass;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Resources\BaseResource;
use spkm\ClearPass\Resources\HasResources;
use spkm\ClearPass\Resources\SingletonResource;
use spkm\ClearPass\Tests\Helpers\FakeClearPass;

$endpoints = require __DIR__.'/endpoints.php';
$listed = array_map(fn (array $row) => $row[0], $endpoints);

function groupAccessors(): array
{
    return array_map(fn (ReflectionMethod $method) => $method->getName(), (new ReflectionClass(HasResources::class))->getMethods(ReflectionMethod::IS_PUBLIC));
}

/**
 * Every resource a group object gives, with made-up values for its scope arguments.
 */
function resourcesOf(BaseResource $group): array
{
    $resources = [];

    foreach ((new ReflectionClass($group))->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
        if ($method->getDeclaringClass()->getName() !== $group::class || ! $method->getReturnType() instanceof ReflectionNamedType || ! is_subclass_of($method->getReturnType()->getName(), BaseResource::class)) {
            continue;
        }

        $args = array_map(fn (ReflectionParameter $parameter) => $parameter->getType() instanceof ReflectionNamedType && $parameter->getType()->getName() === 'int' ? 7 : 'sample', $method->getParameters());
        $resources[$method->getName()] = $group->{$method->getName()}(...$args);
    }

    return $resources;
}

it('gives a resource group for every API', function () {
    expect(groupAccessors())->toHaveCount(16);

    foreach (groupAccessors() as $accessor) {
        expect(FakeClearPass::connector()->{$accessor}())->toBeInstanceOf(BaseResource::class);
    }
});

it('gives every service a resource of the right kind, listing with a listed request', function () use ($listed) {
    $connector = FakeClearPass::connector();
    $count = 0;

    foreach (groupAccessors() as $accessor) {
        foreach (resourcesOf($connector->{$accessor}()) as $name => $resource) {
            $count++;
            expect($resource)->toBeInstanceOf(BaseResource::class);

            if ($resource instanceof Builder) {
                expect(in_array($resource->toRequest()::class, $listed, true))->toBeTrue("{$accessor}()->{$name}() lists with an unlisted request");
            } else {
                expect($resource)->not->toBeInstanceOf(Builder::class);
            }

            if ($resource instanceof SingletonResource) {
                expect(method_exists($resource, 'get'))->toBeTrue();
            }
        }
    }

    expect($count)->toBeGreaterThan(100);
});

it('reaches every group through the facade and documents every call', function () {
    config()->set('clearpass.base_url', 'https://clearpass.school.test');
    config()->set('clearpass.client_id', 'id');
    config()->set('clearpass.client_secret', 'secret');
    $markdown = file_get_contents(__DIR__.'/../../ENDPOINTS.md');
    $readme = file_get_contents(__DIR__.'/../../README.md');

    foreach (groupAccessors() as $accessor) {
        $group = ClearPass::{$accessor}();

        expect($group)->toBeInstanceOf(FakeClearPass::connector()->{$accessor}()::class)
            ->and($markdown)->toContain("ClearPass::{$accessor}()")
            ->and($readme)->toContain("{$accessor}()");

        foreach ((new ReflectionClass($group))->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            if ($method->getDeclaringClass()->getName() === $group::class && ! $method->isConstructor()) {
                expect($markdown)->toContain("ClearPass::{$accessor}()->{$method->getName()}(");
            }
        }
    }
});

it('uses every listed request from some resource', function () use ($listed) {
    $used = [];

    foreach (glob(__DIR__.'/../../src/Resources/*/*.php') as $file) {
        preg_match_all('/^use (spkm\\\\ClearPass\\\\Requests\\\\[^;]+);/m', (string) file_get_contents($file), $matches);
        $used = [...$used, ...$matches[1]];
    }

    expect(array_values(array_diff($listed, $used)))->toBe([]);
});
