<?php

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\ClearPass\Tests\Fixtures\ExampleChild;
use spkm\ClearPass\Tests\Fixtures\ExampleData;
use spkm\ClearPass\Tests\Fixtures\ExampleGuest;

it('builds a model from ClearPass\'s values, casting as the properties say', function () {
    $model = ExampleData::from([
        'id' => '12',
        'name' => 7,
        'enabled' => 'true',
        'ratio' => '1.5',
        'created_at' => '2025-10-31T20:15:00+00:00',
        'tags' => ['a', 'b'],
        'parent' => ['id' => 1, 'label' => 'p'],
        'children' => [['id' => 2, 'label' => 'c'], ['id' => 3]],
        'DisableTLS1.0' => false,
        'unknown' => 'ignored',
    ]);

    expect($model->id)->toBe(12)
        ->and($model->name)->toBe('7')
        ->and($model->enabled)->toBeTrue()
        ->and($model->ratio)->toBe(1.5)
        ->and($model->created_at)->toBeInstanceOf(CarbonImmutable::class)
        ->and($model->created_at->toIso8601String())->toBe('2025-10-31T20:15:00+00:00')
        ->and($model->tags)->toBe(['a', 'b'])
        ->and($model->parent)->toBeInstanceOf(ExampleChild::class)
        ->and($model->parent->label)->toBe('p')
        ->and($model->children)->toBeInstanceOf(Collection::class)
        ->and($model->children->map->id->all())->toBe([2, 3])
        ->and($model->disable_tls_1_0)->toBeFalse();
});

it('serialises back to ClearPass\'s keys, leaving out what is null', function () {
    $model = ExampleData::from(['id' => 1, 'created_at' => '2025-10-31T20:15:00+00:00', 'children' => [['id' => 2]], 'DisableTLS1.0' => true]);

    expect($model->toArray())->toBe(['id' => 1, 'created_at' => '2025-10-31T20:15:00+00:00', 'children' => [['id' => 2]], 'DisableTLS1.0' => true])
        ->and(json_decode(json_encode($model), true))->toBe($model->toArray())
        ->and(ExampleData::from([])->toArray())->toBe([]);
});

it('reads dates as timestamps or strings and sends them back as the model says', function () {
    $guest = ExampleGuest::from(['id' => 1, 'expire_time' => 1767225600]);
    $fromString = ExampleGuest::from(['expire_time' => '2026-01-01T00:00:00+00:00']);

    expect($guest->expire_time?->toIso8601String())->toBe('2026-01-01T00:00:00+00:00')
        ->and($guest->toArray())->toBe(['id' => 1, 'expire_time' => 1767225600])
        ->and($fromString->toArray())->toBe(['expire_time' => 1767225600])
        ->and(ExampleGuest::from(['expire_time' => 0])->expire_time)->toBeNull()
        ->and(ExampleGuest::from(['expire_time' => ''])->expire_time)->toBeNull()
        ->and(ExampleGuest::from(['expire_time' => 'not a date'])->expire_time)->toBeNull()
        ->and(ExampleData::from(['created_at' => '1767225600'])->created_at?->timestamp)->toBe(1767225600)
        ->and(ExampleData::from(['created_at' => '2026-01-01T00:00:00+00:00'])->toArray()['created_at'])->toBe('2026-01-01T00:00:00+00:00')
        ->and(ExampleGuest::dateFormat())->toBe('U')
        ->and(ExampleData::dateFormat())->toBe(DATE_ATOM);
});

it('keeps the custom fields ClearPass Guest stores beyond the documented ones', function () {
    $guest = ExampleGuest::from(['id' => 1, 'username' => 'g', 'visitor_department' => 'Science', 'badge' => 7, '_links' => ['self' => ['href' => 'x']]]);

    expect($guest->extra)->toBe(['visitor_department' => 'Science', 'badge' => 7])
        ->and($guest->toArray())->toBe(['id' => 1, 'username' => 'g', 'visitor_department' => 'Science', 'badge' => 7])
        ->and(ExampleData::from(['id' => 1, 'anything' => 'x'])->toArray())->toBe(['id' => 1]);
});

it('collects a list of records', function () {
    $models = ExampleChild::collect([['id' => 1], ['id' => 2]]);

    expect($models)->toHaveCount(2)
        ->and($models->first())->toBeInstanceOf(ExampleChild::class)
        ->and(ExampleChild::collect(null))->toHaveCount(0);
});
