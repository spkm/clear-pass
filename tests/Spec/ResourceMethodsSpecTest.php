<?php

use Illuminate\Support\Collection;
use Saloon\Http\Faking\MockResponse;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Query\Query;
use spkm\ClearPass\Resources\BaseResource;
use spkm\ClearPass\Resources\HasResources;
use spkm\ClearPass\Resources\SingletonResource;
use spkm\ClearPass\Tests\Helpers\FakeClearPass;

/*
 * Every method a generated resource or group offers, called once against a faked ClearPass that answers everything
 * with one record: each must send a request and give back what its return type promises.
 */

function argumentFor(ReflectionParameter $parameter): mixed
{
    $type = $parameter->getType();
    $name = $type instanceof ReflectionNamedType ? $type->getName() : (string) $type;

    return match (true) {
        $name === 'int' => 7,
        $name === 'string' => 'sample',
        $name === 'bool' => true,
        $name === 'array' || str_contains($name, 'array') => [],
        $name === Query::class || str_contains($name, 'Query') => [],
        $parameter->isDefaultValueAvailable() => $parameter->getDefaultValue(),
        default => 'sample',
    };
}

function checkReturn(ReflectionMethod $method, mixed $result): void
{
    $type = $method->getReturnType();
    $name = $type instanceof ReflectionNamedType ? $type->getName() : 'mixed';

    match (true) {
        $name === 'bool' => expect($result)->toBeTrue(),
        $name === Collection::class => expect($result)->toBeInstanceOf(Collection::class),
        is_subclass_of($name, Data::class) => expect($result)->toBeInstanceOf($name),
        is_subclass_of($name, BaseResource::class) => expect($result)->toBeInstanceOf($name),
        default => expect(true)->toBeTrue(),
    };
}

$groups = array_map(fn (ReflectionMethod $method) => [$method->getName()], (new ReflectionClass(HasResources::class))->getMethods(ReflectionMethod::IS_PUBLIC));

it('answers every method of every resource in the group', function (string $accessor) {
    $mockClient = FakeClearPass::respondWith([FakeClearPass::API_URL.'/*' => MockResponse::make(['id' => 7, 'name' => 'x'])]);
    $group = FakeClearPass::connector()->{$accessor}();
    $calls = 0;

    $exercise = function (BaseResource $resource) use (&$calls, &$exercise) {
        foreach ((new ReflectionClass($resource))->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            if ($method->getDeclaringClass()->getName() !== $resource::class || $method->isConstructor()) {
                continue;
            }

            $result = $resource->{$method->getName()}(...array_map(argumentFor(...), $method->getParameters()));
            checkReturn($method, $result);
            $calls++;

            if ($result instanceof BaseResource) {
                $exercise($result);
            }
        }

        if ($resource instanceof Builder) {
            expect($resource->limit(1)->get())->toBeInstanceOf(Collection::class)
                ->and($resource->first())->toBeInstanceOf(Data::class);

            foreach (['find' => [7], 'create' => [[]], 'update' => [7, []], 'replace' => [7, []], 'delete' => [7]] as $action => $arguments) {
                try {
                    $resource->{$action}(...$arguments);
                    $calls++;
                } catch (LogicException $exception) {
                    expect($exception->getMessage())->toContain("no way to $action");
                }
            }
        }

        if ($resource instanceof SingletonResource) {
            foreach (['get' => [], 'create' => [[]], 'update' => [[]], 'replace' => [[]], 'delete' => []] as $action => $arguments) {
                try {
                    $resource->{$action}(...$arguments);
                    $calls++;
                } catch (LogicException $exception) {
                    expect($exception->getMessage())->toContain("no way to $action");
                }
            }
        }
    };

    $exercise($group);

    expect($calls)->toBeGreaterThan(0)
        ->and($mockClient->getRecordedResponses())->not->toBeEmpty();
})->with($groups);
