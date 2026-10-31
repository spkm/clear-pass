<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\OAuth2\GetClientCredentialsTokenRequest;
use spkm\ClearPass\ClearPassPaginator;
use spkm\ClearPass\Exceptions\UnauthorizedException;
use spkm\ClearPass\Query\Builder;
use spkm\ClearPass\Requests\AdhocBodyRequest;
use spkm\ClearPass\Requests\AdhocListRequest;
use spkm\ClearPass\Requests\AdhocRequest;
use spkm\ClearPass\Tests\Fixtures\ExampleCreateRequest;
use spkm\ClearPass\Tests\Fixtures\ExampleItemRequest;
use spkm\ClearPass\Tests\Fixtures\ExampleListRequest;
use spkm\ClearPass\Tests\Helpers\FakeClearPass;

afterEach(fn () => Carbon::setTestNow());

it('talks to the API under the server address', function () {
    $connector = FakeClearPass::connector(baseUrl: 'https://clearpass.school.test/');

    expect($connector->resolveBaseUrl())->toBe('https://clearpass.school.test/api')
        ->and($connector->baseUrl())->toBe('https://clearpass.school.test/')
        ->and($connector->headers()->get('Accept'))->toBe('application/json');
});

it('fetches a token before the first request, not when it is built', function () {
    $mockClient = FakeClearPass::respondWithToken([ExampleListRequest::class => FakeClearPass::list([])]);
    $connector = FakeClearPass::connector(authenticated: false);

    expect($mockClient->getRecordedResponses())->toBeEmpty();

    $connector->send(new ExampleListRequest);
    $connector->send(new ExampleListRequest);

    $token = FakeClearPass::received($mockClient, GetClientCredentialsTokenRequest::class);
    expect(FakeClearPass::urisReceived($mockClient, GetClientCredentialsTokenRequest::class)[0])->toBe(FakeClearPass::API_URL.'/oauth?grant_type=client_credentials')
        ->and($token->body()?->all())->toMatchArray(['grant_type' => 'client_credentials', 'client_id' => 'client', 'client_secret' => 'secret'])
        ->and(collect($mockClient->getRecordedResponses())->filter(fn ($r) => $r->getRequest() instanceof GetClientCredentialsTokenRequest))->toHaveCount(1)
        ->and(FakeClearPass::received($mockClient, ExampleListRequest::class)->headers()->get('Authorization'))->toBe('Bearer issued-token');
});

it('caches the token, encrypted, for other connectors until a minute before it expires', function () {
    FakeClearPass::respondWithToken([ExampleListRequest::class => FakeClearPass::list([])], FakeClearPass::token('cached-token', 3600));
    FakeClearPass::connector(authenticated: false)->send(new ExampleListRequest);

    $key = collect(Cache::store('array')->getStore()->all ?? [])->keys()->first();
    $stored = collect(app('cache')->store('array')->getStore()->all())->first();

    expect($stored)->toBeArray()
        ->and(json_decode(Crypt::decryptString($stored['value']), true))->toMatchArray(['access_token' => 'cached-token'])
        ->and(json_encode($stored))->not->toContain('cached-token');

    $mockClient = FakeClearPass::respondWith([ExampleListRequest::class => FakeClearPass::list([])]);
    FakeClearPass::connector(authenticated: false)->send(new ExampleListRequest);

    expect(FakeClearPass::received($mockClient, ExampleListRequest::class)->headers()->get('Authorization'))->toBe('Bearer cached-token');
});

it('fetches a new token once the one it holds is a minute from expiring', function () {
    $mockClient = FakeClearPass::respondWith([
        GetClientCredentialsTokenRequest::class => MockResponse::make(['access_token' => 'first', 'token_type' => 'Bearer', 'expires_in' => 120]),
        ExampleListRequest::class => FakeClearPass::list([]),
    ]);
    $connector = FakeClearPass::connector(authenticated: false);

    $connector->send(new ExampleListRequest);
    Carbon::setTestNow(now()->addSeconds(61));
    Cache::flush();
    $mockClient->addResponses([GetClientCredentialsTokenRequest::class => MockResponse::make(['access_token' => 'second', 'token_type' => 'Bearer', 'expires_in' => 3600])]);
    $connector->send(new ExampleListRequest);

    expect(FakeClearPass::urisReceived($mockClient, GetClientCredentialsTokenRequest::class))->toHaveCount(2)
        ->and(collect($mockClient->getRecordedResponses())->filter(fn ($r) => $r->getRequest() instanceof ExampleListRequest)->last()->getPendingRequest()->headers()->get('Authorization'))->toBe('Bearer second');
});

it('fetches a new token and sends again, once, when ClearPass answers 401', function () {
    $mockClient = FakeClearPass::respondWith([
        GetClientCredentialsTokenRequest::class => FakeClearPass::token('fresh'),
        ExampleListRequest::class => MockResponse::make(['title' => 'Unauthorized', 'status' => 401], 401),
    ]);
    $connector = FakeClearPass::connector();

    $response = $connector->send(new ExampleListRequest);

    expect($response->status())->toBe(401)
        ->and(FakeClearPass::urisReceived($mockClient, ExampleListRequest::class))->toHaveCount(2)
        ->and(FakeClearPass::urisReceived($mockClient, GetClientCredentialsTokenRequest::class))->toHaveCount(1)
        ->and(collect($mockClient->getRecordedResponses())->filter(fn ($r) => $r->getRequest() instanceof ExampleListRequest)->last()->getPendingRequest()->headers()->get('Authorization'))->toBe('Bearer fresh');

    config()->set('clearpass.reauthenticate', false);
    $mockClient = FakeClearPass::respondWith([ExampleListRequest::class => MockResponse::make([], 401)]);
    FakeClearPass::connector()->send(new ExampleListRequest);
    expect(FakeClearPass::urisReceived($mockClient, ExampleListRequest::class))->toHaveCount(1);
});

it('describes a refused client', function () {
    FakeClearPass::respondWith([GetClientCredentialsTokenRequest::class => MockResponse::make(['error' => 'invalid_client', 'error_description' => 'The client credentials are invalid'], 400)]);

    expect(fn () => FakeClearPass::connector(authenticated: false)->send(new ExampleListRequest))
        ->toThrow(UnauthorizedException::class, 'ClearPass responded 400 to POST /api/oauth: invalid_client; The client credentials are invalid');
});

it('takes its timeouts and retries from config', function () {
    config()->set('clearpass.timeouts', ['connect' => 3, 'request' => 7]);
    config()->set('clearpass.retries', ['times' => 3, 'interval_ms' => 1]);
    $connector = FakeClearPass::connector();

    expect($connector->getConnectTimeout())->toBe(3.0)
        ->and($connector->getRequestTimeout())->toBe(7.0)
        ->and($connector->tries)->toBe(3);
});

it('retries a GET, not a write, on a connection failure or a server error', function () {
    config()->set('clearpass.retries', ['times' => 3, 'interval_ms' => 1]);
    $mockClient = FakeClearPass::respondWith([
        ExampleItemRequest::class => MockResponse::make([], 503),
        ExampleCreateRequest::class => MockResponse::make([], 503),
    ]);
    $connector = FakeClearPass::connector();

    $connector->send(new ExampleItemRequest(1));
    $connector->send(new ExampleCreateRequest(['name' => 'x']));

    expect(FakeClearPass::urisReceived($mockClient, ExampleItemRequest::class))->toHaveCount(3)
        ->and(FakeClearPass::urisReceived($mockClient, ExampleCreateRequest::class))->toHaveCount(1);

    $fatal = new FatalRequestException(new RuntimeException('down'), $connector->createPendingRequest(new ExampleItemRequest(1)));
    expect($connector->handleRetry($fatal, new ExampleItemRequest(1)))->toBeTrue()
        ->and($connector->handleRetry($fatal, new ExampleCreateRequest([])))->toBeFalse();
});

it('makes ad-hoc calls by method and path', function () {
    $mockClient = FakeClearPass::respondWith([AdhocRequest::class => MockResponse::make(['id' => 1]), AdhocBodyRequest::class => MockResponse::make(['id' => 1])]);
    $connector = FakeClearPass::connector();

    $connector->get('/role', ['limit' => 2]);
    $connector->post('role', ['name' => 'x']);
    $connector->put('/role/1', ['name' => 'y'], ['change_of_authorization' => 'true']);
    $connector->patch('/role/1', ['name' => 'z']);
    $connector->delete('/role/1');

    $uris = FakeClearPass::urisReceived($mockClient, AdhocRequest::class);
    $methods = collect($mockClient->getRecordedResponses())->map(fn ($r) => $r->getPendingRequest()->getMethod()->value)->all();
    $bodies = FakeClearPass::bodiesReceived($mockClient, AdhocRequest::class);
    $rawBodies = collect($mockClient->getRecordedResponses())->map(fn ($r) => (string) $r->getPsrRequest()->getBody())->all();

    expect($uris)->toBe([FakeClearPass::API_URL.'/role?limit=2', FakeClearPass::API_URL.'/role', FakeClearPass::API_URL.'/role/1?change_of_authorization=true', FakeClearPass::API_URL.'/role/1', FakeClearPass::API_URL.'/role/1'])
        ->and($methods)->toBe(['GET', 'POST', 'PUT', 'PATCH', 'DELETE'])
        ->and($bodies[1])->toBe(['name' => 'x'])
        ->and($rawBodies[0])->toBe('')
        ->and($rawBodies[4])->toBe('')
        ->and($bodies[2])->toBe(['name' => 'y']);
});

it('gives a builder over any collection with from()', function () {
    $mockClient = FakeClearPass::respondWith([AdhocListRequest::class => FakeClearPass::list([['id' => 1, 'name' => 'a']])]);
    $connector = FakeClearPass::connector();

    $builder = $connector->from('/new-thing');
    $records = $builder->where('name', 'a')->get();

    expect($builder)->toBeInstanceOf(Builder::class)
        ->and($records->all())->toBe([['id' => 1, 'name' => 'a']])
        ->and(FakeClearPass::urisReceived($mockClient, AdhocListRequest::class)[0])->toBe(FakeClearPass::API_URL.'/new-thing?filter=%7B%22name%22%3A%22a%22%7D')
        ->and($connector->paginate(new ExampleListRequest))->toBeInstanceOf(ClearPassPaginator::class);
});
