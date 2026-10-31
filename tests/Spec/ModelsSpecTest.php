<?php

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\ClearPass\Data\Data;

$models = collect(glob(__DIR__.'/../../src/Data/*/*.php'))
    ->map(fn (string $file) => 'spkm\\ClearPass\\Data\\'.basename(dirname($file)).'\\'.basename($file, '.php'))
    ->mapWithKeys(fn (string $class) => [str_replace('spkm\\ClearPass\\Data\\', '', $class) => [$class]])
    ->all();

it('builds every model from ClearPass\'s values and serialises it back', function (string $class) {
    $attributes = [];
    $expected = [];
    $reflection = new ReflectionClass($class);
    $aliases = $reflection->getConstant('ALIASES') ?: [];

    foreach ($reflection->getConstructor()->getParameters() as $parameter) {
        $type = $parameter->getType();
        $name = $parameter->getName();
        $key = $aliases[$name] ?? $name;
        expect($type)->toBeInstanceOf(ReflectionNamedType::class)
            ->and($parameter->isDefaultValueAvailable())->toBeTrue()
            ->and($name)->toMatch('/^[A-Za-z_]\w*$/');

        if ($name === 'extra') {
            continue;
        }

        [$attributes[$key], $expected[$key]] = match ($type->getName()) {
            'int' => ['12', 12],
            'float' => ['1.5', 1.5],
            'bool' => ['true', true],
            'string' => [7, '7'],
            'array' => [['a' => 1], ['a' => 1]],
            CarbonImmutable::class => ['2026-01-01T00:00:00+00:00', $reflection->getConstant('DATE_FORMAT') === 'U' ? 1767225600 : '2026-01-01T00:00:00+00:00'],
            Collection::class => [[[]], [[]]],
            default => is_subclass_of($type->getName(), Data::class) ? [[], []] : throw new LogicException("$class::$name has an unexpected type"),
        };
    }

    $model = $class::from($attributes);

    expect($model)->toBeInstanceOf(Data::class)
        ->and($model->toArray())->toBe($expected)
        ->and($class::from([]))->toBeInstanceOf($class)
        ->and($class::from([])->toArray())->toBe([]);
})->with($models);

it('has a model for every request that returns one', function () use ($models) {
    $endpoints = require __DIR__.'/endpoints.php';
    $classes = array_map(fn (array $row) => $row[0], $models);

    foreach ($endpoints as $name => [, , , , $shape, $dto]) {
        if ($shape !== 'none') {
            expect($dto)->not->toBeNull("$name has no model")
                ->and(in_array($dto, $classes, true))->toBeTrue("$name returns ".($dto ?? 'nothing').', which is not a model');
        }
    }

    expect(count($models))->toBeGreaterThan(200);
});
