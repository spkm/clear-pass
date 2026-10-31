<?php

use Illuminate\Support\Collection;
use Saloon\Contracts\Body\HasBody;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use spkm\ClearPass\Data\Data;
use spkm\ClearPass\Requests\ClearPassRequest;
use spkm\ClearPass\Tests\Helpers\FakeClearPass;

$endpoints = require __DIR__.'/endpoints.php';

it('sends the method and path ClearPass documents, and maps the response', function (string $class, array $args, string $method, string $path, string $shape, ?string $dto, bool $hasBody, bool $paginatable) {
    /** @var ClearPassRequest $request */
    $request = new $class(...$args);

    expect($request)->toBeInstanceOf(ClearPassRequest::class)
        ->and($request->getMethod()->value)->toBe($method)
        ->and($request->resolveEndpoint())->toBe($path)
        ->and($request->dtoClass())->toBe($dto)
        ->and($request->responseShape())->toBe($shape)
        ->and($request instanceof Paginatable)->toBe($paginatable)
        ->and($request instanceof HasBody)->toBe($hasBody)
        ->and($request->isSafe())->toBe($method === 'GET');

    $sample = ['id' => 7, 'name' => 'x'];
    $response = match ($shape) {
        'list' => FakeClearPass::send($request, ['_embedded' => ['items' => [$sample]], '_links' => []]),
        'one' => FakeClearPass::send($request, $sample, $method === 'POST' ? 201 : 200),
        default => FakeClearPass::send($request, '', 204),
    };
    $result = $response->dto();

    expect((string) $response->getPsrRequest()->getUri())->toStartWith(FakeClearPass::API_URL.$path);

    match ($shape) {
        'list' => expect($result)->toBeInstanceOf(Collection::class)->toHaveCount(1)->and($result->first())->toBeInstanceOf($dto ?? 'array'),
        'one' => expect($result)->toBeInstanceOf($dto)->and($result)->toBeInstanceOf(Data::class),
        default => expect($result)->toBeNull(),
    };

    if ($hasBody) {
        expect(json_decode((string) $response->getPsrRequest()->getBody(), true))->toBe(['name' => 'x']);
    }
})->with($endpoints);

it('lists every request class once', function () use ($endpoints) {
    $classes = collect(glob(__DIR__.'/../../src/Requests/*/*/*Request.php'))
        ->map(fn (string $file) => 'spkm\\ClearPass\\Requests\\'.basename(dirname($file, 2)).'\\'.basename(dirname($file)).'\\'.basename($file, '.php'))
        ->sort()
        ->values();
    $listed = collect($endpoints)->map(fn (array $row) => $row[0])->sort()->values();

    expect($listed->all())->toBe($classes->all())
        ->and($listed->unique())->toHaveCount($listed->count())
        ->and($classes)->toHaveCount(814)
        ->and(collect($endpoints)->keys()->unique())->toHaveCount(count($endpoints));
});

it('documents every request in ENDPOINTS.md', function () use ($endpoints) {
    $markdown = file_get_contents(__DIR__.'/../../ENDPOINTS.md');

    foreach ($endpoints as $row) {
        expect($markdown)->toContain('`'.str_replace('spkm\\ClearPass\\Requests\\', '', $row[0]).'`');
    }
});
