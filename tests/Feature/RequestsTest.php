<?php

use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Faking\MockResponse;
use spkm\ClearPass\Exceptions\ServerErrorException;
use spkm\ClearPass\Requests\AdhocRequest;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Support\Payload;
use spkm\ClearPass\Tests\Fixtures\ExampleCreateRequest;
use spkm\ClearPass\Tests\Fixtures\ExampleData;
use spkm\ClearPass\Tests\Fixtures\ExampleDeleteRequest;
use spkm\ClearPass\Tests\Fixtures\ExampleEnableRequest;
use spkm\ClearPass\Tests\Fixtures\ExampleGuest;
use spkm\ClearPass\Tests\Fixtures\ExampleItemRequest;
use spkm\ClearPass\Tests\Fixtures\ExampleListRequest;
use spkm\ClearPass\Tests\Fixtures\ExampleUpdateRequest;
use spkm\ClearPass\Tests\Helpers\FakeClearPass;

it('reads a HAL list, a bare list and a bare object', function () {
    $hal = FakeClearPass::send(new ExampleListRequest, ['_embedded' => ['items' => [['id' => 1], ['id' => 2], 'junk']], '_links' => [], 'count' => 2]);
    $bare = FakeClearPass::send(new ExampleListRequest, [['id' => 3]]);
    $object = FakeClearPass::send(new ExampleListRequest, ['id' => 4]);
    $items = FakeClearPass::send(new ExampleListRequest, ['items' => [['id' => 5]]]);

    expect($hal->dto())->toBeInstanceOf(Collection::class)
        ->and($hal->dto()->map->id->all())->toBe([1, 2])
        ->and(Payload::count($hal))->toBe(2)
        ->and($bare->dto()->map->id->all())->toBe([3])
        ->and($object->dto()->map->id->all())->toBe([4])
        ->and($items->dto()->map->id->all())->toBe([5])
        ->and(FakeClearPass::send(new ExampleListRequest, [])->dto())->toHaveCount(0)
        ->and(FakeClearPass::send(new ExampleListRequest, '')->dto())->toBeNull()
        ->and(fn () => Payload::count($bare))->toThrow(UnexpectedValueException::class, 'has no count; ask for one with calculate_count')
        ->and(fn () => Payload::records(FakeClearPass::send(new ExampleListRequest, '"text"')))->toThrow(UnexpectedValueException::class, 'is not a record or a list of records');
});

it('maps one record, and nothing for 204 and 304', function () {
    expect(FakeClearPass::send(new ExampleItemRequest(1), ['id' => 1, 'name' => 'a'])->dto())->toBeInstanceOf(ExampleData::class)
        ->and(FakeClearPass::send(new ExampleItemRequest(1), ['_embedded' => ['items' => [['id' => 9]]]])->dto()->id)->toBe(9)
        ->and(FakeClearPass::send(new ExampleUpdateRequest(1, ['name' => 'b']), '', 204)->dto())->toBeNull()
        ->and(FakeClearPass::send(new ExampleUpdateRequest(1, ['name' => 'b']), '', 304)->dto())->toBeNull()
        ->and(FakeClearPass::send(new ExampleDeleteRequest(1), '', 204)->dto())->toBeNull()
        ->and(FakeClearPass::send(new ExampleDeleteRequest(1), ['ignored' => true])->dto())->toBeNull();
});

it('treats a success that is not JSON as a server error', function () {
    expect(fn () => FakeClearPass::send(new ExampleItemRequest(1), '<html><title>Maintenance</title></html>', 200, ['Content-Type' => 'text/html'])->dto())
        ->toThrow(ServerErrorException::class, "ClearPass responded 200 to GET /api/example/1 with an HTML page instead of JSON ('Maintenance')")
        ->and(fn () => FakeClearPass::send(new ExampleListRequest, 'not json')->dto())
        ->toThrow(ServerErrorException::class, 'with a body that is not JSON');
});

it('sends a record as JSON, from an array or a model, with the documented query options', function () {
    $mockClient = FakeClearPass::respondWith([
        ExampleCreateRequest::class => MockResponse::make(['id' => 1], 201),
        ExampleUpdateRequest::class => MockResponse::make(['id' => 1]),
        ExampleEnableRequest::class => MockResponse::make(['id' => 1]),
        ExampleDeleteRequest::class => MockResponse::make('', 204),
    ]);
    $connector = FakeClearPass::connector();

    $connector->send(new ExampleCreateRequest(['name' => 'a', 'enabled' => true]));
    $connector->send(new ExampleUpdateRequest(1, ExampleGuest::from(['username' => 'g', 'expire_time' => 100, 'custom' => 'x']), ['change_of_authorization' => 'true']));
    $connector->send(new ExampleEnableRequest(1, ['async' => 'false']));
    $connector->send(new ExampleDeleteRequest(1, ['change_of_authorization' => 'true']));

    expect(FakeClearPass::bodiesReceived($mockClient, ExampleCreateRequest::class)[0])->toBe(['name' => 'a', 'enabled' => true])
        ->and(FakeClearPass::received($mockClient, ExampleCreateRequest::class)->headers()->get('Content-Type'))->toBe('application/json')
        ->and(FakeClearPass::bodiesReceived($mockClient, ExampleUpdateRequest::class)[0])->toBe(['username' => 'g', 'expire_time' => 100, 'custom' => 'x'])
        ->and(FakeClearPass::urisReceived($mockClient, ExampleUpdateRequest::class)[0])->toBe(FakeClearPass::API_URL.'/example/1?change_of_authorization=true')
        ->and(FakeClearPass::urisReceived($mockClient, ExampleEnableRequest::class)[0])->toBe(FakeClearPass::API_URL.'/example/1/enable?async=false')
        ->and((string) FakeClearPass::received($mockClient, ExampleEnableRequest::class)->body())->toBe('')
        ->and(FakeClearPass::urisReceived($mockClient, ExampleDeleteRequest::class)[0])->toBe(FakeClearPass::API_URL.'/example/1?change_of_authorization=true');
});

it('knows which requests are safe to retry and what they return', function () {
    expect((new ExampleListRequest)->isSafe())->toBeTrue()
        ->and((new ExampleItemRequest(1))->isSafe())->toBeTrue()
        ->and((new ExampleCreateRequest([]))->isSafe())->toBeFalse()
        ->and((new ExampleEnableRequest(1))->isSafe())->toBeFalse()
        ->and((new ExampleDeleteRequest(1))->isSafe())->toBeFalse()
        ->and((new ExampleListRequest)->dtoClass())->toBe(ExampleData::class)
        ->and((new ExampleListRequest)->responseShape())->toBe(ClearPassRequest::LIST)
        ->and((new ExampleDeleteRequest(1))->responseShape())->toBe(ClearPassRequest::NONE)
        ->and((new AdhocRequest(Method::GET, '/x'))->isSafe())->toBeTrue()
        ->and((new AdhocRequest(Method::POST, '/x'))->isSafe())->toBeFalse();
});

it('caches a GET only when caching is on', function () {
    $mockClient = FakeClearPass::respondWith([ExampleItemRequest::class => MockResponse::make(['id' => 1])]);
    $connector = FakeClearPass::connector();

    $connector->send(new ExampleItemRequest(1));
    $connector->send(new ExampleItemRequest(1));
    expect(FakeClearPass::urisReceived($mockClient, ExampleItemRequest::class))->toHaveCount(2);

    config()->set('clearpass.cache.enabled', true);
    $mockClient = FakeClearPass::respondWith([ExampleItemRequest::class => MockResponse::make(['id' => 2]), ExampleCreateRequest::class => MockResponse::make(['id' => 3], 201)]);
    $connector->send(new ExampleItemRequest(2));
    $cached = $connector->send(new ExampleItemRequest(2));
    $connector->send(new ExampleCreateRequest(['name' => 'x']));
    $connector->send(new ExampleCreateRequest(['name' => 'x']));

    expect(FakeClearPass::urisReceived($mockClient, ExampleItemRequest::class))->toHaveCount(1)
        ->and($cached->isCached())->toBeTrue()
        ->and(FakeClearPass::urisReceived($mockClient, ExampleCreateRequest::class))->toHaveCount(2);
});
