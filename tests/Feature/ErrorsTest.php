<?php

use Saloon\Http\Faking\MockResponse;
use spkm\ClearPass\ClearPassApiException;
use spkm\ClearPass\Exceptions\InvalidRequestException;
use spkm\ClearPass\Exceptions\NotFoundException;
use spkm\ClearPass\Exceptions\ServerErrorException;
use spkm\ClearPass\Exceptions\UnauthorizedException;
use spkm\ClearPass\Exceptions\ValidationException;
use spkm\ClearPass\Tests\Fixtures\ExampleCreateRequest;
use spkm\ClearPass\Tests\Fixtures\ExampleItemRequest;
use spkm\ClearPass\Tests\Helpers\FakeClearPass;

it('throws the exception for the status', function (int $status, string $class) {
    config()->set('clearpass.reauthenticate', false);
    FakeClearPass::respondWith([ExampleItemRequest::class => FakeClearPass::problem($status, 'Problem', 'Something happened')]);
    $response = FakeClearPass::connector()->send(new ExampleItemRequest(1));

    expect(fn () => $response->dto())->toThrow($class, "ClearPass responded $status to GET /api/example/1: Problem; Something happened");
})->with([
    [404, NotFoundException::class],
    [401, UnauthorizedException::class],
    [403, UnauthorizedException::class],
    [422, ValidationException::class],
    [400, InvalidRequestException::class],
    [406, InvalidRequestException::class],
    [415, InvalidRequestException::class],
    [408, ServerErrorException::class],
    [500, ServerErrorException::class],
    [503, ServerErrorException::class],
    [418, ClearPassApiException::class],
]);

it('says which fields of a rejected record were wrong', function () {
    FakeClearPass::respondWith([ExampleCreateRequest::class => FakeClearPass::problem(422, 'Unprocessable Entity', 'Validation failed', [
        'username' => ['isEmpty' => "Value is required and can't be empty"],
        'role_id' => ['notInArray' => 'Not a valid role', 'isEmpty' => 'Value is required'],
        'password' => 'Too short',
        'nested' => ['rule' => ['a', 'b']],
    ])]);

    try {
        FakeClearPass::connector()->send(new ExampleCreateRequest(['name' => '']))->dto();
        $this->fail('No exception');
    } catch (ValidationException $exception) {
        expect($exception)->toBeInstanceOf(InvalidRequestException::class)
            ->and($exception->title())->toBe('Unprocessable Entity')
            ->and($exception->detail())->toBe('Validation failed')
            ->and($exception->validationMessages())->toBe([
                'username' => ['isEmpty' => "Value is required and can't be empty"],
                'role_id' => ['notInArray' => 'Not a valid role', 'isEmpty' => 'Value is required'],
                'password' => ['invalid' => 'Too short'],
                'nested' => ['rule' => 'a; b'],
            ])
            ->and($exception->getMessage())->toBe("ClearPass responded 422 to POST /api/example: Unprocessable Entity; Validation failed; username: Value is required and can't be empty; role_id: Not a valid role; Value is required; password: Too short; nested: a; b");
    }
});

it('reads the errors ClearPass gives for a rejected parameter, and a message in a result', function () {
    FakeClearPass::respondWith([ExampleItemRequest::class => MockResponse::make(['validation_errors' => ['filter' => 'Filter must specify a JSON object'], 'type' => 'about:blank', 'title' => 'Unprocessable Entity', 'status' => 422, 'detail' => 'Parameter validation failed'], 422)]);

    try {
        FakeClearPass::connector()->send(new ExampleItemRequest(1))->dto();
        $this->fail('No exception');
    } catch (ValidationException $exception) {
        expect($exception->validationMessages())->toBe(['filter' => ['invalid' => 'Filter must specify a JSON object']])
            ->and($exception->getMessage())->toBe('ClearPass responded 422 to GET /api/example/1: Unprocessable Entity; Parameter validation failed; filter: Filter must specify a JSON object');
    }

    FakeClearPass::respondWith([ExampleItemRequest::class => MockResponse::make(['result' => ['error' => 1, 'message' => 'No sessions available', 'no_sessions_available' => 1], 'type' => 'about:blank', 'title' => 'Internal Server Error', 'status' => 500, 'detail' => 'Internal Server Error'], 500)]);
    expect(fn () => FakeClearPass::connector()->send(new ExampleItemRequest(1))->dto())
        ->toThrow(ServerErrorException::class, 'ClearPass responded 500 to GET /api/example/1: Internal Server Error; No sessions available');
});

it('describes an answer that is not API Problem JSON', function () {
    FakeClearPass::respondWith([ExampleItemRequest::class => MockResponse::make('<html><head><title>502 Bad Gateway</title></head></html>', 502, ['Content-Type' => 'text/html'])]);
    expect(fn () => FakeClearPass::connector()->send(new ExampleItemRequest(1))->dto())
        ->toThrow(ServerErrorException::class, "ClearPass responded 502 to GET /api/example/1 with an HTML error page ('502 Bad Gateway')");

    FakeClearPass::respondWith([ExampleItemRequest::class => MockResponse::make('Service down', 503)]);
    expect(fn () => FakeClearPass::connector()->send(new ExampleItemRequest(1))->dto())
        ->toThrow(ServerErrorException::class, 'ClearPass responded 503 to GET /api/example/1: Service down');

    FakeClearPass::respondWith([ExampleItemRequest::class => MockResponse::make('', 500)]);
    expect(fn () => FakeClearPass::connector()->send(new ExampleItemRequest(1))->dto())
        ->toThrow(ServerErrorException::class, 'ClearPass responded 500 to GET /api/example/1');

    FakeClearPass::respondWith([ExampleItemRequest::class => FakeClearPass::problem(404, 'Not Found')]);
    try {
        FakeClearPass::connector()->send(new ExampleItemRequest(1))->dto();
    } catch (NotFoundException $exception) {
        expect($exception->detail())->toBeNull()
            ->and($exception->validationMessages())->toBe([])
            ->and($exception->getMessage())->toBe('ClearPass responded 404 to GET /api/example/1: Not Found');
    }
});

it('does not repeat a detail that only says the title again', function () {
    FakeClearPass::respondWith([ExampleItemRequest::class => FakeClearPass::problem(403, 'Forbidden', 'Forbidden')]);

    expect(fn () => FakeClearPass::connector()->send(new ExampleItemRequest(1))->dto())
        ->toThrow(UnauthorizedException::class, 'ClearPass responded 403 to GET /api/example/1: Forbidden');
});
