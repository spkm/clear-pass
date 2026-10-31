<?php

use Saloon\Http\Faking\MockResponse;
use spkm\ClearPass\Exceptions\ServerErrorException;
use spkm\ClearPass\Requests\AdhocListRequest;
use spkm\ClearPass\Tests\Fixtures\ExampleData;
use spkm\ClearPass\Tests\Fixtures\ExampleListRequest;
use spkm\ClearPass\Tests\Helpers\FakeClearPass;

it('asks for each page by offset and stops at a short page', function () {
    $pages = [
        FakeClearPass::list([['id' => 1], ['id' => 2]], links: FakeClearPass::link('next')),
        FakeClearPass::list([['id' => 3], ['id' => 4]], links: FakeClearPass::link('next')),
        FakeClearPass::list([['id' => 5]], links: FakeClearPass::link('next')),
    ];
    $mockClient = FakeClearPass::respondWith([ExampleListRequest::class => function () use (&$pages) {
        return array_shift($pages);
    }]);

    $paginator = FakeClearPass::connector()->paginate(new ExampleListRequest(['sort' => '+id']), 2);
    $items = $paginator->dtos()->all();

    expect($items)->toHaveCount(5)
        ->and($items[0])->toBeInstanceOf(ExampleData::class)
        ->and(collect($items)->map->id->all())->toBe([1, 2, 3, 4, 5])
        ->and(FakeClearPass::queriesReceived($mockClient, ExampleListRequest::class))->toBe([
            ['sort' => '+id', 'limit' => 2, 'offset' => 0],
            ['sort' => '+id', 'limit' => 2, 'offset' => 2],
            ['sort' => '+id', 'limit' => 2, 'offset' => 4],
        ]);
});

it('stops at a full page without a link to the next, and at an empty page', function () {
    $pages = [FakeClearPass::list([['id' => 1], ['id' => 2]]), FakeClearPass::list([['id' => 3]])];
    $mockClient = FakeClearPass::respondWith([ExampleListRequest::class => function () use (&$pages) {
        return array_shift($pages);
    }]);

    expect(FakeClearPass::connector()->paginate(new ExampleListRequest, 2)->collect()->count())->toBe(2)
        ->and(FakeClearPass::urisReceived($mockClient, ExampleListRequest::class))->toHaveCount(1);

    $pages = [FakeClearPass::list([['id' => 1]], links: FakeClearPass::link('next')), FakeClearPass::list([])];
    FakeClearPass::respondWith([ExampleListRequest::class => function () use (&$pages) {
        return array_shift($pages);
    }]);
    expect(FakeClearPass::connector()->paginate(new ExampleListRequest, 1)->collect()->count())->toBe(1);
});

it('takes the page size from config and gives items as arrays for a request without a model', function () {
    config()->set('clearpass.pagination.per_page', 3);
    $mockClient = FakeClearPass::respondWith([AdhocListRequest::class => FakeClearPass::list([['id' => 1]])]);

    $paginator = FakeClearPass::connector()->paginate(new AdhocListRequest('/thing'));

    expect($paginator->collect()->all())->toBe([['id' => 1]])
        ->and(FakeClearPass::queriesReceived($mockClient, AdhocListRequest::class)[0])->toBe(['limit' => 3, 'offset' => 0])
        ->and(fn () => $paginator->dtos())->toThrow(LogicException::class, 'AdhocListRequest has no model; use collect()');
});

it('knows how many pages there are only when the count was asked for', function () {
    FakeClearPass::respondWith([ExampleListRequest::class => FakeClearPass::list([['id' => 1]], 7)]);
    $paginator = FakeClearPass::connector()->paginate(new ExampleListRequest(['calculate_count' => 'true']), 3);
    $paginator->current();

    expect((new ReflectionMethod($paginator, 'getTotalPages'))->invoke($paginator, $paginator->current()))->toBe(3);

    FakeClearPass::respondWith([ExampleListRequest::class => FakeClearPass::list([['id' => 1]])]);
    $paginator = FakeClearPass::connector()->paginate(new ExampleListRequest, 3);
    expect(fn () => (new ReflectionMethod($paginator, 'getTotalPages'))->invoke($paginator, $paginator->current()))->toThrow(UnexpectedValueException::class, 'has no count');
});

it('treats a page that is not JSON as a server error', function () {
    FakeClearPass::respondWith([ExampleListRequest::class => MockResponse::make('<html></html>', 200, ['Content-Type' => 'text/html'])]);

    expect(fn () => FakeClearPass::connector()->paginate(new ExampleListRequest)->collect()->all())->toThrow(ServerErrorException::class);
});
