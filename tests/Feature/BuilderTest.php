<?php

use Carbon\CarbonImmutable;
use Saloon\Http\Faking\MockResponse;
use spkm\ClearPass\ClearPassConnector;
use spkm\ClearPass\ClearPassPaginator;
use spkm\ClearPass\Exceptions\NotFoundException;
use spkm\ClearPass\Exceptions\UnauthorizedException;
use spkm\ClearPass\Exceptions\ValidationException;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Tests\Fixtures\ExampleByNameRequest;
use spkm\ClearPass\Tests\Fixtures\ExampleCreateRequest;
use spkm\ClearPass\Tests\Fixtures\ExampleData;
use spkm\ClearPass\Tests\Fixtures\ExampleDeleteRequest;
use spkm\ClearPass\Tests\Fixtures\ExampleEnableRequest;
use spkm\ClearPass\Tests\Fixtures\ExampleItemRequest;
use spkm\ClearPass\Tests\Fixtures\ExampleListRequest;
use spkm\ClearPass\Tests\Fixtures\ExampleReadOnlyResource;
use spkm\ClearPass\Tests\Fixtures\ExampleReplaceRequest;
use spkm\ClearPass\Tests\Fixtures\ExampleResource;
use spkm\ClearPass\Tests\Fixtures\ExampleSettingRequest;
use spkm\ClearPass\Tests\Fixtures\ExampleSettingResource;
use spkm\ClearPass\Tests\Fixtures\ExampleSettingUpdateRequest;
use spkm\ClearPass\Tests\Fixtures\ExampleUpdateRequest;
use spkm\ClearPass\Tests\Helpers\FakeClearPass;

function example(): ExampleResource
{
    return new ExampleResource(FakeClearPass::connector());
}

it('turns conditions into ClearPass\'s filter', function () {
    $builder = example()
        ->where('role_id', 2)
        ->where('expire_time', '<', CarbonImmutable::parse('2026-01-01T00:00:00+00:00'))
        ->whereNot('enabled', false)
        ->whereIn('id', [1, 2])
        ->whereNotIn('sponsor_profile', ['x'])
        ->whereBetween('simultaneous_use', [1, 3])
        ->whereContains('notes', 'parent')
        ->whereRegex('username', '^a', caseInsensitive: true)
        ->whereNull('mac')
        ->whereNotNull('email')
        ->orderByDesc('id')
        ->offset(10)
        ->limit(5);

    expect($builder->toFilter()->toArray())->toBe([
        'role_id' => 2,
        'expire_time' => ['$lt' => '2026-01-01T00:00:00+00:00'],
        'enabled' => ['$ne' => false],
        'id' => ['$in' => [1, 2]],
        'sponsor_profile' => ['$nin' => ['x']],
        'simultaneous_use' => ['$gte' => 1, '$lte' => 3],
        'notes' => ['$contains' => 'parent'],
        'username' => ['$regex' => '^a', '$options' => 'i'],
        'mac' => ['$exists' => false],
        'email' => ['$exists' => true],
    ])
        ->and($builder->toArray())->toMatchArray(['sort' => '-id', 'offset' => 10, 'limit' => 5])
        ->and($builder->toRequest())->toBeInstanceOf(ExampleListRequest::class)
        ->and($builder->toQuery()->getLimit())->toBe(5)
        ->and(example()->where('mac', null)->toFilter()->toArray())->toBe(['mac' => ['$exists' => false]])
        ->and(example()->forPage(3, 20)->toArray())->toBe(['offset' => 40, 'limit' => 20]);
});

it('groups alternatives and negations with closures', function () {
    $either = example()->where('a', 1)->orWhere('b', 2)->toFilter()->toArray();
    $group = example()->where('a', 1)->orWhere(fn (Builder $query) => $query->where('b', 2)->where('c', '>', 3))->toFilter()->toArray();
    $not = example()->whereNot(fn (Builder $query) => $query->where('b', 2))->where('a', 1)->toFilter()->toArray();
    $orNull = example()->where('a', 1)->orWhere('b', null)->toFilter()->toArray();

    expect($either)->toBe(['$or' => [['a' => 1], ['b' => 2]]])
        ->and($group)->toBe(['$or' => [['a' => 1], ['b' => 2, 'c' => ['$gt' => 3]]]])
        ->and($not)->toBe(['$not' => ['b' => 2], 'a' => 1])
        ->and($orNull)->toBe(['$or' => [['a' => 1], ['b' => ['$exists' => false]]]]);
});

it('gets one page of models', function () {
    $mockClient = FakeClearPass::respondWith([ExampleListRequest::class => FakeClearPass::list([['id' => 1, 'name' => 'a'], ['id' => 2, 'name' => 'b']], 2)]);

    $records = example()->where('name', 'a')->orderBy('name')->get();

    expect($records)->toHaveCount(2)
        ->and($records->first())->toBeInstanceOf(ExampleData::class)
        ->and($records->first()->name)->toBe('a')
        ->and(FakeClearPass::urisReceived($mockClient, ExampleListRequest::class)[0])->toBe(FakeClearPass::API_URL.'/example?filter=%7B%22name%22%3A%22a%22%7D&sort=%2Bname');
});

it('fetches the first record and counts the rest', function () {
    $mockClient = FakeClearPass::respondWith([ExampleListRequest::class => FakeClearPass::list([['id' => 7]], 42)]);

    $first = example()->where('a', 1)->first();
    $count = example()->where('a', 1)->count();
    $exists = example()->exists();

    expect($first->id)->toBe(7)
        ->and($count)->toBe(42)
        ->and($exists)->toBeTrue()
        ->and(FakeClearPass::queriesReceived($mockClient, ExampleListRequest::class))->toBe([
            ['filter' => '{"a":1}', 'limit' => 1],
            ['filter' => '{"a":1}', 'limit' => 1, 'calculate_count' => 'true'],
            ['limit' => 1, 'calculate_count' => 'true'],
        ]);

    FakeClearPass::respondWith([ExampleListRequest::class => FakeClearPass::list([])]);
    expect(example()->first())->toBeNull();
});

it('finds a record by id, by name, or not at all', function () {
    $mockClient = FakeClearPass::respondWith([
        ExampleItemRequest::class => MockResponse::make(['id' => 5, 'name' => 'five']),
        ExampleByNameRequest::class => MockResponse::make(['id' => 6, 'name' => 'six']),
    ]);

    expect(example()->find(5)->name)->toBe('five')
        ->and(example()->findOrFail(5)->id)->toBe(5)
        ->and(example()->findByName('six')->id)->toBe(6)
        ->and(FakeClearPass::urisReceived($mockClient, ExampleItemRequest::class)[0])->toBe(FakeClearPass::API_URL.'/example/5');

    FakeClearPass::respondWith([
        ExampleItemRequest::class => FakeClearPass::problem(404, 'Not Found'),
        ExampleByNameRequest::class => FakeClearPass::problem(404, 'Not Found'),
    ]);
    expect(example()->find(9))->toBeNull()
        ->and(example()->findByName('none'))->toBeNull()
        ->and(fn () => example()->findOrFail(9))->toThrow(NotFoundException::class, 'ClearPass responded 404 to GET /api/example/9: Not Found');
});

it('finds by filtering when ClearPass has no item endpoint', function () {
    $mockClient = FakeClearPass::respondWith([ExampleListRequest::class => FakeClearPass::list([['id' => 3]])]);
    $resource = new ExampleReadOnlyResource(FakeClearPass::connector());

    expect($resource->where('x', 1)->find(3)->id)->toBe(3)
        ->and($resource->findOrFail(3)->id)->toBe(3)
        ->and(FakeClearPass::queriesReceived($mockClient, ExampleListRequest::class)[0])->toBe(['filter' => '{"id":3}', 'limit' => 1]);

    FakeClearPass::respondWith([ExampleListRequest::class => FakeClearPass::list([])]);
    expect($resource->find(4))->toBeNull()
        ->and(fn () => $resource->findOrFail(4))->toThrow(NotFoundException::class);
});

it('pages through every record lazily, mapping errors on the way', function () {
    config()->set('clearpass.pagination.per_page', 2);
    $pages = [
        FakeClearPass::list([['id' => 1], ['id' => 2]], links: FakeClearPass::link('next')),
        FakeClearPass::list([['id' => 3], ['id' => 4]], links: FakeClearPass::link('next')),
        FakeClearPass::list([['id' => 5]]),
    ];
    $mockClient = FakeClearPass::respondWith([ExampleListRequest::class => function () use (&$pages) {
        return array_shift($pages);
    }]);

    $all = example()->where('a', 1)->limit(999)->all();

    expect($all->map->id->all())->toBe([1, 2, 3, 4, 5])
        ->and(FakeClearPass::queriesReceived($mockClient, ExampleListRequest::class))->toBe([
            ['filter' => '{"a":1}', 'limit' => 2, 'offset' => 0],
            ['filter' => '{"a":1}', 'limit' => 2, 'offset' => 2],
            ['filter' => '{"a":1}', 'limit' => 2, 'offset' => 4],
        ])
        ->and(example()->paginate())->toBeInstanceOf(ClearPassPaginator::class);

    FakeClearPass::respondWith([ExampleListRequest::class => FakeClearPass::problem(403, 'Forbidden')]);
    expect(fn () => example()->lazy()->all())->toThrow(UnauthorizedException::class)
        ->and(fn () => example()->cursor(3)->first())->toThrow(UnauthorizedException::class);
});

it('creates, updates, replaces, deletes and acts on records', function () {
    $mockClient = FakeClearPass::respondWith([
        ExampleCreateRequest::class => MockResponse::make(['id' => 1, 'name' => 'new'], 201),
        ExampleUpdateRequest::class => MockResponse::make(['id' => 1, 'name' => 'changed']),
        ExampleReplaceRequest::class => MockResponse::make('', 304),
        ExampleDeleteRequest::class => MockResponse::make('', 204),
        ExampleEnableRequest::class => MockResponse::make(['id' => 1, 'enabled' => true]),
    ]);

    $created = example()->create(['name' => 'new']);
    $updated = example()->update(1, ExampleData::from(['name' => 'changed']), ['change_of_authorization' => 'true']);
    $replaced = example()->replace(1, ['name' => 'same']);
    $deleted = example()->delete(1, ['change_of_authorization' => 'true']);
    $enabled = example()->enable(1);

    expect($created)->toBeInstanceOf(ExampleData::class)
        ->and($created->name)->toBe('new')
        ->and($updated->name)->toBe('changed')
        ->and($replaced)->toBeNull()
        ->and($deleted)->toBeTrue()
        ->and($enabled->enabled)->toBeTrue()
        ->and(FakeClearPass::bodiesReceived($mockClient, ExampleCreateRequest::class)[0])->toBe(['name' => 'new'])
        ->and(FakeClearPass::bodiesReceived($mockClient, ExampleUpdateRequest::class)[0])->toBe(['name' => 'changed'])
        ->and(FakeClearPass::urisReceived($mockClient, ExampleUpdateRequest::class)[0])->toBe(FakeClearPass::API_URL.'/example/1?change_of_authorization=true')
        ->and(FakeClearPass::urisReceived($mockClient, ExampleDeleteRequest::class)[0])->toBe(FakeClearPass::API_URL.'/example/1?change_of_authorization=true');
});

it('throws for an error on a write', function () {
    FakeClearPass::respondWith([ExampleCreateRequest::class => FakeClearPass::problem(422, 'Unprocessable Entity', 'Validation failed', ['name' => ['isEmpty' => 'Value is required']])]);

    expect(fn () => example()->create(['name' => '']))->toThrow(ValidationException::class, 'name: Value is required');
});

it('refuses an action ClearPass does not document for the collection', function () {
    $resource = new ExampleReadOnlyResource(FakeClearPass::connector());

    expect(fn () => $resource->create(['a' => 1]))->toThrow(LogicException::class, "ClearPass's API documents no way to create these records.")
        ->and(fn () => $resource->update(1, []))->toThrow(LogicException::class, 'no way to update')
        ->and(fn () => $resource->replace(1, []))->toThrow(LogicException::class, 'no way to replace')
        ->and(fn () => $resource->delete(1))->toThrow(LogicException::class, 'no way to delete');
});

it('reads and changes a setting ClearPass keeps one of', function () {
    $mockClient = FakeClearPass::respondWith([
        ExampleSettingRequest::class => MockResponse::make(['id' => 1, 'name' => 'setting']),
        ExampleSettingUpdateRequest::class => MockResponse::make(['id' => 1, 'name' => 'changed']),
    ]);
    $setting = new ExampleSettingResource(FakeClearPass::connector());

    expect($setting->get()->name)->toBe('setting')
        ->and($setting->update(['name' => 'changed'])->name)->toBe('changed')
        ->and(FakeClearPass::bodiesReceived($mockClient, ExampleSettingUpdateRequest::class)[0])->toBe(['name' => 'changed'])
        ->and(fn () => $setting->create([]))->toThrow(LogicException::class, "ClearPass's API documents no way to create this setting.")
        ->and(fn () => $setting->replace([]))->toThrow(LogicException::class, 'no way to replace')
        ->and(fn () => $setting->delete())->toThrow(LogicException::class, 'no way to delete')
        ->and($setting->connector())->toBeInstanceOf(ClearPassConnector::class);
});
